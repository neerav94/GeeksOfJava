import java.util.*;
class queue
{
    int arr[];
    int front, rear;
    /*constructor for queue class*/
    public queue(int size)
    {
	arr = new int[size];
        front = -1;
	rear = -1;
    }
    /*method to check if the queue is empty*/
    public boolean isEmpty()
    {
	if(front == rear)
	    return true;
	return false;
    }

    /*method to insert element in the queue*/
    public void insert(int element)
    {
	arr[++rear] = element;
    }

    /*method to delete element from the queue*/
    public int delete()
    {
	return arr[++front];
    }

}

/*Implementation of the queue class*/
public class LargestMultipleOf3
{
    public static void main(String args[])
    {
	int array[] = {2, 5, 9, 0, 6}; //input array
	int sum = 0;
	int size = array.length;
        /*Three objects for queue class to maintain 3 queue's*/
	queue q0 = new queue(size);
	queue q1 = new queue(size);
	queue q2 = new queue(size);
	Arrays.sort(array); //Sort the array
	for(int i=0;i<size;i++)
	{
	/*if number%3==0 insert in q0
	  if number%3==1 insert in q1
	  if number%3==2 insert in q2*/
	    if(array[i]%3==0)
		q0.insert(array[i]);
	    if(array[i]%3==1)
		q1.insert(array[i]);
	    if(array[i]%3==2)
		q2.insert(array[i]);
	    /*sum of all the array elements*/
	    sum+=array[i];
	}
	/*if the sum of all the elements on dividing by 3 gives
	  remainder as 1 than delete 1 element from q1 but if q1
	  is empty than delete 2 elements from q2 and if q2 has
	  has less than 2 elements than the number is not possible*/
        if(sum%3==1)
	{
	    if(!q1.isEmpty())
	    {
		q1.delete();
		size--;
	    }
	    else
	    {
		q2.delete();
		size--;
	        if(!q2.isEmpty())
		{
		    q2.delete();
		    size--;
		}
		else
		{
		    System.out.println("Number not possible");
		    System.exit(0);
		}
	    }
	}
	/*if the sum of all the elements on dividing by 3 gives
	  remainder as 2 than delete 1 element from q2 but if q2
	  is empty than delete 2 elements from q1 and if q1 has
	  has less than 2 elements than the number is not possible*/
        if(sum%3==2)
	{
	    if(!q2.isEmpty())
	    {
		q2.delete();
		size--;
	    }
	    else
	    {
		q1.delete();
		size--;
	        if(!q1.isEmpty())
		{
		    q1.delete();
		    size--;
		}
		else
		{
		    System.out.println("Number not possible");
		    System.exit(0);
		}
	    }
	}
	/*now input all the elements from q0, q1 and q2 and insert
	  them in an auxilliary array.*/
	Integer[] auxilliary = new Integer[size];
	int index=0;
	while(!q0.isEmpty())
	{
	    auxilliary[index]=q0.delete();
	    index++;
        }

	while(!q1.isEmpty())
	{
	    auxilliary[index]=q1.delete();
            index++;
        }

	while(!q2.isEmpty())
	{
	    auxilliary[index]=q2.delete();
	    index++;
        }
	/*Sort the auxilliary array in decreasing order*/
	Arrays.sort(auxilliary, Collections.reverseOrder());

        for(int i=0;i<auxilliary.length;i++)
	    System.out.print(auxilliary[i]);
	System.out.println();
    }
}

//Source for algo : http://www.geeksforgeeks.org/find-the-largest-number-multiple-of-3/
