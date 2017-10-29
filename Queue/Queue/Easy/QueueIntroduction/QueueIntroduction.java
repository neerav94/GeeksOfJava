//Queue implementation in Java
class queue
{
    protected int arr[];
    protected int front, rear, size;

    /*  Constructor for queue */
    public queue(int n)
    {
        size = n;
        arr = new int[size];
        front = -1;
	rear = -1;
    }

    /* method to check if the queue is empty*/
    public boolean isEmpty()
    {
	if(front==-1 && rear==-1 || front>=rear)
	    return true;
	return false;
    }

    /* method to check if the queue is full*/
    public boolean isFull()
    {
	if(front==0 && rear==(size-1))
	    return true;
	return false;
    }

    /* method to push the element in the queue */
    public void insert(int element)
    {
	if(isFull())
	{
	    System.out.println("Queue is full");
	    System.exit(0);
	}
	else
	{
	    rear++;
	    arr[rear]=element;
	    System.out.println(element+" is inserted to the queue");
	}
    }
    /* method to remove the element from the queue */
    public int remove()
    {
	if(isEmpty())
	{
	    System.out.println("Queue is empty");
	    System.exit(0);
	}
	else
	{
	    front++;
	    return arr[front];
	}
	return -1;
    }
}

/*  Class queue implementation */
public class QueueIntroduction
{
    public static void main(String []args)
    {
        /* Creating object of class queue */
        queue q = new queue(50);
        q.insert(4);
        q.insert(57);
        q.insert(25);
        int num = q.remove();
        System.out.println(num+" is removed from queue");
    }
}
