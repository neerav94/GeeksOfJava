/* URL-http://www.geeksforgeeks.org/leaders-in-an-array/
 * Leaders in an array
Write a program to print all the LEADERS in the array. 
An element is leader if it is greater than all the elements to its right side.
 And the rightmost element is always a leader. 
 */
package geeksArray;

public class Leader 
{
	public static void main(String args[])
	{
		int a[]={16, 17, 4, 3, 5, 2};
		int n=a.length-1;
		System.out.println("leader is " + a[n]);
		int max=a[n];
		for(int i=n-1;i>=0;i--)
		{
			if(max<a[i])
			{
				max=a[i];
				System.out.println("leader is " + max);
			}
		}
	}
}
