/*node class for the doubly linked list*/
class node
{
    /*info will contain the element to be pushed or popped from the queue
      and next will contain the address of the next node in the list and
      previous will contain the address of the previous node in the list*/
    
    /*last node's next will contain null i.e. it will not point to anything
      and first node's previous of the list will contain null*/
    protected int info;
    protected node next;
    protected node previous;
}

class queue
{
    node head; //head pointer for queue
    node end;  //end pointer for queue
    
    /*constructor for queue class*/
    queue()
    {
	head = null;
	end = null;
    }

    /*method to insert in the beginning of the queue*/
    public void insertFirst(int element)
    {
	/*create the object of the node class*/
	node t = new node();
	/*element will be pushed to the info section of the node*/
	t.info = element;
	/*if the queue is empty than head and end of the queue
          will be the new element to be inserted as it will be
	  the first and last element in the queue*/
	if(head==null && end==null)
	{
	/*the next and previous of the first element will be null*/
	    t.next=null;
	    t.previous = null;
	    head=t;
	    end=t;
	}
	else
	{
	    t.next=head;
	    t.previous=null;
	    head.previous=t;
	    head=t;
	}
    }

    /*method to insert the element at the end of the queue*/
    public void insertLast(int element)
    {
	/*create the object of the node class*/
	node t = new node();
	/*element will be pushed to the info section of the node*/
	t.info = element;
	/*if the queue is empty than head and end of the queue
          will be the new element to be inserted as it will be
	  the first and last element in the queue*/
	if(head==null)
	{
	/*the next and previous of the first element will be null*/
	    t.next=null;
	    t.previous = null;
	    head=t;
	    end=t;
	}
	else
	{
	    t.next=null;
	    t.previous=end;
	    end.next=t;
	    end=t;
	}
    }

    /*method to delete an element from the beginning of the queue*/
    public int deleteFirst()
    {
	/*if head and end are pointing to null that means there is an
	  empty queue*/
	if(head==null && end==null)
	{
	    System.out.println("No elements in the queue");
	    System.exit(0);
	}
	else
	{
	    int temp=head.info;
	    head=head.next;
	    head.previous=null;
	    return temp;
	}
	return -1;
    }

    /*method to delete an element from the end of the queue*/
    public int deleteLast()
    {
	/*if head and end are pointing to null that means there is an
	  empty queue*/
	if(head==null && end==null)
	{
	    System.out.println("No elements in the queue");
	    System.exit(0);
	}
	else
	{
	    int temp=end.info;
	    end = end.previous;
	    end.next=null;
	    return temp;
	}
	return -1;
    }

    /*method to display the queue*/
    public void display()
    {
	node disp=head;
	while(disp!=null)
	{
	    System.out.print(disp.info+" ");
	    disp=disp.next;
	}
	System.out.println();
    }
}

/*implementation of the above written queue class*/
public class Dequeue
{
    public static void main(String args[])
    {
	/*Creating object of the queue class*/
	queue q=new queue();
	q.insertFirst(3);
	q.insertFirst(2);
	q.insertLast(4);
	q.insertFirst(1);
	q.insertLast(5);
	q.display();
	System.out.println("Number deleted from first "+q.deleteFirst());
	System.out.println("Number deleted from last "+q.deleteLast());
	q.display();
    }
}
