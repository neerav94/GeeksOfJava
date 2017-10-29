class Stack
{
    protected int s1[]; //s1 stack
    protected int s2[]; //s2 stack
    /*top1 to maintain s1's top pointer and top2 to maintain s2's 
      top pointer*/
    protected int top1, top2, size; 

    /*  Constructor for Stack */
    public Stack(int n)
    {
        size = n;
        s1 = new int[size];
	s2 = new int[size];
        top1 = -1;
	top2 = -1;
    }

    /* Function to check if s1 is empty */
    public boolean isEmpty()
    { 
        if(top1<=-1)
            return true;
        return false;
    }

    /* Function to check if s1 is full */
    public boolean isFull()
    {
        if(top1>=(size-1))
            return true;
        return false;
    }

    /* Function to insert the element in the queue*/
    public void insert(int element)
    {
        /*if queue is full than overflow condition*/
        if(isFull())
        {
            System.out.println("Overflow");
	    System.exit(0);
        }
        /*else if the queue id empty than just push the element in s1*/
	else if(isEmpty())
	{
	    s1[++top1] = element;
	}
	/*else:
        1: pop elements from s1 and push them to s2 till s1 doesn't become
	   empty i.e. till top1!=-1
	2: push the element in s1
	3: pop from s2 and push into s1 till s2 doesn't get empty i.e. 
	   till top2!=-1*/
        else
        {
	    while(top1 != -1)
	        s2[++top2]=s1[top1--];
	    s1[++top1]=element;
	    while(top2 != -1)
		s1[++top1]=s2[top2--];
        }
    }
    
    /*method to delete the element from the queue*/
    public int delete()
    {
	/*if the queue is empty than underflow condition*/
	if(isEmpty())
	{
	    System.out.println("Underflow");
	    System.exit(0);
	}
	/*else simply return the top of the stack s1 i.e. remove the first inserted 
	  element from queue*/
	else
	{
	    return s1[top1--];
	}
	return -1;
    }

    /*method to display the queue*/
    public void display()
    {
	for(int i=0;i<=top1;i++)
	    System.out.print(s1[i]+" ");
	System.out.println();
    }
}

/*Implementation of the above class*/
public class QeueUsingStacks
{
    public static void main(String args[])
    {
	/*object for the above class*/
	Stack s = new Stack(10);
	s.insert(1);
	s.insert(2);
	s.insert(3);
	s.insert(4);
	s.display(); //display() called before deleting an element from queue
	System.out.println("Deleted number: "+s.delete());
	s.display(); //display() called after deleting an element from queue
    }
}
