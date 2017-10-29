from numpy import *
import pickle

f=open("/home/kunal/paper_weights/ml_paper_weights","r")
l=[]
c=0
try:
	while True:
		w=pickle.load(f)
		l.append(w[1])
		c+=1
except:
	pass	

class cluster_node:
    def __init__(self,vec,left=None,right=None,distance=0.0,id=None,count=1):
        self.left=left
        self.right=right
        self.vec=vec
        self.id=id
        self.distance=distance
        self.count=count #only used for weighted average 

def L2dist(v1,v2):
    return sqrt(sum((v1-v2)**2))

def hcluster(features,distance=L2dist):
    #cluster the rows of the "features" matrix
    distances={}
    currentclustid=-1

    # clusters are initially just the individual rows
    clust=[cluster_node(array(features[i]),id=i) for i in range(len(features))]

    while len(clust)>1:
        lowestpair=(0,1)
        closest=distance(clust[0].vec,clust[1].vec)

        # loop through every pair looking for the smallest distance
        for i in range(len(clust)):
            for j in range(i+1,len(clust)):
                # distances is the cache of distance calculations
                if (clust[i].id,clust[j].id) not in distances: 
                    distances[(clust[i].id,clust[j].id)]=distance(clust[i].vec,clust[j].vec)

                d=distances[(clust[i].id,clust[j].id)]

                if d < closest:
                    closest=d
                    lowestpair=(i,j)

        # calculate the average of the two clusters
        mergevec=[(clust[lowestpair[0]].vec[i]+clust[lowestpair[1]].vec[i])/2.0 \
            for i in range(len(clust[0].vec))]
	#print lowestpair[0],lowestpair[1],mergevec
        # create the new cluster
        newcluster=cluster_node(array(mergevec),left=clust[lowestpair[0]],
                             right=clust[lowestpair[1]],
                             distance=closest,id=currentclustid)

        # cluster ids that weren't in the original set are negative
        currentclustid-=1
        del clust[lowestpair[1]]
        del clust[lowestpair[0]]
        clust.append(newcluster)

    return clust[0]
def extract_clusters(clust,dist):
    # extract list of sub-tree clusters from hcluster tree with distance < dist
    clusters = {}
    if clust.distance < dist:
        # we have found a cluster subtree
        return [clust]
    else:
        # check the right and left branches
        cl = []
        cr = []
        if clust.left!=None: 
            cl = extract_clusters(clust.left,dist=dist)
        if clust.right!=None: 
            cr = extract_clusters(clust.right,dist=dist)
        return cl+cr

def get_cluster_elements(clust):
    # return ids for elements in a cluster sub-tree
    if clust.id>0:
        # positive id means that this is a leaf
        return [clust.id]
    else:
        # check the right and left branches
        cl = []
        cr = []
        if clust.left!=None: 
            cl = get_cluster_elements(clust.left)
        if clust.right!=None: 
            cr = get_cluster_elements(clust.right)
        return cl+cr

s=hcluster(l)
all_clusters=extract_clusters(s,0.5)
final=[]
for i in all_clusters:
	final.append(get_cluster_elements(i))
f.close()
#f=open("/home/kunal/paper_weights/clusters_ml","w")
#pickle.dump(final,f)
cluster_numbers=[0]*(c)
for i in range(len(final)):
	l=final[i]
	for j in l:
		cluster_numbers[j]=i+1
cluster_numbers=cluster_numbers[1:]
print cluster_numbers,len(cluster_numbers)
