//stack implementation in Java
import java.util.*;
class Stack
{
    protected char arr[];
    protected int top, size;

    /*  Constructor for Stack */
    public Stack(int n)
    {
        size = n;
        arr = new char[size];
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
    public void push(char a)
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
    public char pop()
    {
        if(isEmpty())
	{
            System.out.println("Underflow");
	    System.exit(0);
	}        
	else
        {
            char element = arr[top--];
            return element;
        }
        return '\0';
    }

    /* Function to check the top of the stack */
    public char peek()
    {
        if(isEmpty())
	{
            System.out.println("Underflow");
	    System.exit(0);
        }
	else
            return arr[top];
        return '\0'; 
    }
}
/*  Class Stack implementation */
public class InfixToPostfix
{
    public static void main(String args[])
    {
	/* infix expression to evaluate */
	String infix = "2*3+8/(1-2)";
        int length = infix.length();
	/* String to store the postfix expression evaluated */        
	String postfix = "";
	
	/* Creating object of class stack */
	Stack s = new Stack(length);
	char letter = ' ';

	/* loop for parsing the whole string */
	for(int i=0;i<length;i++)
	{ 
	    letter = infix.charAt(i);
	    /*if character is alphanumeric, print it*/
	    if(Character.isLetter(letter) || Character.isDigit(letter))
		postfix+=letter;
	    
	    /* if opening parentheses than push it */
	    else if(letter=='(')
		s.push(letter);
	    
	    /* if closing parentheses than pop the elements
	       till top of stack is not '('*/
	    else if(letter == ')')
            {
		while(s.peek()!='(')
		    postfix+=s.pop();
	        /* pop '(' but not print it */
		s.pop();
	    }
	    
	    /*if letter is an operator than check for the precedence*/
	    else if(letter =='+' || letter =='-' || letter =='*' || letter=='/')
	    {
		if(s.isEmpty())
		    s.push(letter);
		else
		{
		    while(!s.isEmpty() && s.peek()!='(' && precedence(letter) <= precedence(s.peek()))
		    {
			char temp = s.pop();            	        
			postfix+=temp;
                    }
		    s.push(letter);	    
		}
            }
	    else
	    {
		System.out.println("Invalid infix expression");
		System.exit(0);
	    }
	}
	while(!s.isEmpty())
	    postfix+=s.pop();
        System.out.println("Converted postfix is: "+postfix);
    }
    /* Function to check the precedence rule */
    public static int precedence(char operator)
    {
	switch(operator)
        {
	    /*if operator is + or - than return 1 as they have same precedence*/
	    case '+':
	    case '-': return 1;
	    /*if operator is * or / than return 2 as they have same precedence*/
	    case '*':
            case '/': return 2;
        }
	return -1;
    }
}
