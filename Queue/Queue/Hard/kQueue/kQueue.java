//queue implementation in Java

class queue
{
    protected int arr[];
    /*rear array is used to store the index of rear pointer
      for each queue */
    protected int rear[];
    protected int front[];

    /*  Constructor for queue */
    public queue(int n, int k)
    {
    /*k is the size of each queue*/
        arr = new int[n];
        rear = new int[k];
	front = new int[k];
	/*initialise rear array and front array with the initial 
          position of each queue */

        /*temp is used to store the rear and front of each queue 
          and is thus increamented accordingly*/
	int temp=0;
    	for(int i=0;i<rear.length;i++)
	{
	    rear[i] = temp;
	    front[i] = temp;
            temp+=n/k;
        }
    }

    /*method to check if the queue is empty*/
    public boolean isEmpty(int q)
    {
	if(rear[q]==front[q])
            return true;
	return false;
    }

    /*method to check if the queue is full*/
    public boolean isFull(int q)
    {
	if(rear[q]==((q+1)*10))
            return true;
	return false;
    }

    /*function to insert the element in queue number q*/
    public void insert(int element, int q)
    {
        if(isFull(q))
	{
            System.out.println("This queue is already full");
	    System.exit(0);
        }
	else
	{
	/*position will contain the currently empty rear pointer
          of queue q and after the element is inserted onto
          that rear it is increamented*/
	    int position = rear[q];
	    arr[position]=element;
	    rear[q]++;
	}
    }

    /*function to remove the element from queue q*/
    public int remove(int q)
    {
	if(isEmpty(q))
	{
	    System.out.println("queue is empty no element to remove");
	    System.exit(0);
	}
	else
	{
	/*position will contain the index where the first element in 
          that queue was inserted. After that element has been extracted
	  front is increamented i.e. element has been deleted*/
	    int position = front[q];
            int element = arr[position];
            front[q]++;
            return element;
	}
        return -1;
    }
}

/*  Class queue implementation */
public class kQueue
{
    public static void main(String []args)
    {
        /* Creating object of class queue with array size of 50 i.e. 
           5 queues with each of size 10 are implemented*/
        queue q = new queue(50,5); 
        q.insert(12,2);
	q.insert(13,2);
	q.insert(14,2);
	q.insert(15,2);
	q.insert(10,1);
        System.out.println("element removed from queue 2 is: "+q.remove(2));
	System.out.println("element removed from queue 2 is: "+q.remove(2));
	System.out.println("element removed from queue 1 is: "+q.remove(1));
	System.out.println("element removed from queue 1 is: "+q.remove(1));
    }
}
