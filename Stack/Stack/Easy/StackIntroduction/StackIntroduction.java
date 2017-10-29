//stack implementation in Java

class Stack
{
    protected int arr[];
    protected int top, size;

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
            System.out.println(a+" pushed to stack");
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
}

/*  Class Stack implementation */
public class StackIntroduction
{
    public static void main(String []args)
    {
        /* Creating object of class Stack */
        Stack s = new Stack(50);
        s.push(4);
        s.push(57);
        s.push(25);
        int num = s.pop();
        System.out.println(num+" is popped from stack");
        System.out.println(s.peek()+" is at the top of the stack");
    }
}
