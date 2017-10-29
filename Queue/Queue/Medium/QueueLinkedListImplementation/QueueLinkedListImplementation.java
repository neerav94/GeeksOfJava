//Queue implementation in Java
class node
{
    /*info will contain the element to be inserted or deleted from the queue
      and next will contain the address of the next node in the list*/
    
    /*last node's next will contain null i.e. it will not point to anything*/
    protected int info;
    protected node next;
}

class queue
{
    node front; //front pointer of the queue
    node rear;  //rear pointer of the queue
    int count;
    
    /*constructor for queue class*/
    public queue()
    {
	front = null;
	rear = null;
	count=0;
    }
 
    /*method to insert element in the queue*/
    public void insert(int element)
    {
	/*create the object of the node class*/
	node t = new node();
	/*element will be pushed to the info section of the node and it will be the 
	  rear and front end of the queue*/
	t.info = element;
	t.next = null;
	if(rear==null)
	{
            rear=t;
	    front=t;
	    count++;
	    System.out.println(element+" is inserted to the queue");
	}
	else
	{
	    rear=front;
	    while(rear.next!=null)
		rear=rear.next;
	    rear.next=t;
	    rear=t;           
	    count++;
	    System.out.println(element+" is inserted to the queue");
	}
    }

    /*method to delete an element from the queue*/
    public int remove()
    {
	if(count<=0)
	{
            System.out.println("Queue is empty");
	    System.exit(0);

	}
	else
	{
	    int temp = front.info;
	    front = front.next;
	    count--;
	    return temp;
	}
        return -1;
    }

    /*method to display elements in the queue*/
    public void display()
    {
	node temp = front;
	while(temp!=null)
	{
	    System.out.print(temp.info+" ");
	    System.out.println();
	    temp=temp.next;
	}
    } 
}

/*  Class queue implementation */
public class QueueLinkedListImplementation
{
    public static void main(String []args)
    {
        /* Creating object of class Stack */
        queue q = new queue();
        q.insert(4);
        q.insert(57);
        q.insert(25);
	q.display();
        int num = q.remove();
        System.out.println(num+" is removed from queue");
	q.display();
    }
}
