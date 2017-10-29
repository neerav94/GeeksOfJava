/*Priority class's method implementation in JAVA*/
class PriorityQueue
{
    /*2-d array is made. 1st row will store the element and 2nd row will
      store the priority for each element*/
    int array[][];
    int pointer;
    int size;
    /*prior is used in delete method to remove the element priority wise*/
    static int prior; 
    /*constructor for Priority class*/
    public Priority(int n)
    {
        size=n;
        array=new int[2][size];
        pointer =-1;
	prior=1; //lower number has higher priority 
    }
    /*method to insert element and priority in the array*/
    public void insert(int element, int priority)
    {
	/*checking if the array is already full*/
        if(pointer==size)
        {
	    System.out.println("Overflow");
	    System.exit(0);
        }
	/*if not full than pointer is increamented and in array[0] element is
	  filled and array[1] is filled by its priority*/
        else
        {
	    pointer++;
	    array[0][pointer]=element;
	    array[1][pointer]=priority;
        }
    }
    /*method to delete an element from the array*/
    public int delete()
    {
	/*checking if the array is empty*/
        if(pointer==-1)
        {
	    System.out.println("Underflow");
	    System.exit(0);
        }
	/*if the array is not empty than the element is found according to
	  the prior's value and is returned and priority is made -1 which means
          that it doesnt have any priority which means that element of that priority
	  is removed and prior is increamented*/
        else
        {
	    for(int i=0;i<pointer;i++)
	    {
	        if(array[1][i]==prior)
	        {
		    int temp=array[0][i];
		    array[1][i]=-1;
		    //getPriority();
		    prior++;
		    return temp;
	        }
	    }
        }
        return -1;
    }
    /*method to get the priority of the element deleted*/
    public int getPriority()
    {
	return prior;
    }
    /*method to display the element present in the array with its priority*/
    public void display()
    {
	for(int i=0;i<=pointer;i++)
	{
	    /*if priority is not -1 than the element and priority is printed*/
	    if(array[1][i]!=-1)
	    {
	        System.out.print(array[0][i]+"  "+array[1][i]);
	        System.out.println();
	    }
	    else
		continue;
	}
    }
}

/*implementation of Priority class*/
public class priorityQueue
{
    public static void main(String args[])
    {
	/*object of Priority class*/
	Priority p = new Priority(10);
	p.insert(23,5);
	p.insert(12,3);
	p.insert(34,1);
	p.insert(13,4);
	p.insert(10,7);
	p.insert(6,2);
	p.insert(20,6);
	System.out.println("element: "+p.delete()+"\tpriority: "+(p.getPriority()-1));
	System.out.println("element: "+p.delete()+"\tpriority: "+(p.getPriority()-1));
	System.out.println("element: "+p.delete()+"\tpriority: "+(p.getPriority()-1));
	System.out.println("array after deleting the elements is:");
	p.display();
    }
}
