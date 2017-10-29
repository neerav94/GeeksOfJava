import java.util.*;
class GenerateBinaryNumber
{
    public static void main(String args[])
    {
        Queue<String> q = new LinkedList<String>();
	q.add("1"); //add binary equivalent of 1 to the queue
	int n=8; //till this number convert into binary
	int i=1; 
	while(n>0)
	{
	    String s1 = q.remove(); //remove the front element
	    System.out.println(i+" = "+s1); //print the front element
	    String s2 = s1; //store the removed element in other string 
	    s1+="0"; //append 0 to the removed element
	    s2+="1"; //append 1 to the removed element
	    q.add(s1); //add the element back to the queue
	    q.add(s2); //add the element back to the queue
	    n--;
	    i++;
	}
	
    }
}
