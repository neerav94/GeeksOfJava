/* stack implementation in java */
class Stack
{
    int []arr;
    int top, size;
    
    /*  Constructor for Stack */
    public Stack(int n)
    {
        size = n;
        arr = new int[size];
        top = -1;
    }

    /* Function to check if the stack is empty */
    public boolean isEmpty()
    { 
        if(top<=-1)
            return true;
        return false;
    }

    /* Function to check if the stack is full */
    public boolean isFull()
    {
        if(top>=(size-1))
            return true;
        return false;
    }

    /* Function to push the element in the stack*/
    public void push(int a)
    {
        if(isFull())
        {
            System.out.println("Overflow");
	    System.exit(0);
        }
        else
        {
            arr[++top]=a;
        }
    }

    /* Function to pop the elements from a stack */
    public int pop()
    {
        if(isEmpty())
	{
            System.out.println("Underflow");
	    System.exit(0);
	}        
	else
        {
            int element = arr[top--];
            return element;
        }
        return -1;
    }

    /* method to check the top of the stack */
    public int peek()
    {
        if(isEmpty())
	{
            System.out.println("Underflow");
	    System.exit(0);
        }
	else
            return arr[top];
        return -1; 
    }

    /* Function to insert the values in sorted order in the stack */
    public void insertInOrder(int ele)
    {
	if(isEmpty())
            push(ele);
        else
        {
	    if(peek() >= ele)
		push(ele);
	    else
	    {
                int temp = pop();
                insertInOrder(ele);
                push(temp);
	    }
	}
    }

    /* Function to pop all the values from the stack recursively */
    public void popAll()
    {
	if(!isEmpty())
	{
            int temp = pop();
            popAll();
            insertInOrder(temp);
	}
    }

    /* Function to display the complete Stack */
    public void display()
    {
        for(int i=0;i<=top;i++)
	    System.out.print(arr[i]+" ");
    }
}

/*  Class Stack implementation */
public class SortStack
{
    public static void main(String []args)
    {
        /* Creating object of class Stack */
        Stack s = new Stack(30);
        s.push(8);
        s.push(14);
        s.push(-34);
	s.push(0);
	s.push(2);

	System.out.println("Original stack is:");
	s.display();
	System.out.println();
        s.popAll();
	System.out.println("Sorted stack is:");
	s.display();      
	System.out.println();
	System.exit(0);  
    }
}
