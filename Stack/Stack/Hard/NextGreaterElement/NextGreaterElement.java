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
            arr[++top]=a;
        }
    }

    /* Function to pop the element from the stack */
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

    /* Function to check the top of the stack */
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
public class NextGreaterElement
{
    public static void main(String []args)
    {
	int array[] = {3, 6, 8, 5, 12, 4, 9};
        /* Creating object of class Stack */
        Stack s = new Stack(array.length);

        /* push the first element in the stack */
        s.push(array[0]);

        /* iterate for the rest of the elements of the array */
        for (int i = 1; i < array.length; i++) 
	{
            if (!s.isEmpty()) 
	    {
                while (true) 
		{
		    /* if the top of the stack is greater than the incoming element of the array than:
		       i)  break the loop
		       ii) push the array element onto the stack 
		       else
		       i)  keep popping the element till the top of the stack is smaller than the 
			   incoming element of the stack*/
                    if(s.isEmpty() || s.peek() >= array[i])
                        break;
                    System.out.println(s.pop() + "-->" + array[i]);
                }
            }
            s.push(array[i]);
        }

	/* pop all the remaining elements of the stack and print -1 for them */
        while (!s.isEmpty()) 
	{
            System.out.println(s.pop() + "-->" + -1);
        }
    }
}
