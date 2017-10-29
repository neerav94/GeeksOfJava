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

    /* Function to push the numbers in the stack*/
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
}

/*  Class Stack implementation */
class PostfixEvaluation
{
    /* Function to evaluate the expression */
    public static int evaluate(int temp1, int temp2, char op)
    {
        int result=0;
        switch(op)
                {
                    case '+':
			result = temp2 + temp1;
                        break;
                    case '-':
                        result = temp2 - temp1;;
			break;
                    case '*':
                        result = temp2 * temp1;;            
			break;
                    case '/':
                        result = temp2 / temp1;;            
			break;
                }
        return result;
    }

    public static void main(String args[])
    {
        /* Creating object of class Stack */
        Stack s = new Stack(50);

        String ch =  "832+-9*3/";
        int len = ch.length();
	for(int i=0;i<len;i++)
        {
            char letter = ch.charAt(i);
            if(Character.isDigit(letter))  //Check if the character is a digit
                s.push(letter-'0');
            else                          //if the character is a operator
            {
                int temp1 = s.pop();
                int temp2 = s.pop();
                int result = evaluate(temp1, temp2, letter);
                s.push(result);
            }
        }
        System.out.println("The answer is: "+s.pop());
    }           
}
