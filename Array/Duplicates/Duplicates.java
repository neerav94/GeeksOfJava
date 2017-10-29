/*
 * http://www.geeksforgeeks.org/find-duplicates-in-on-time-and-constant-extra-space/
 */
package geeksArray;

public class Duplicates
{
	public static void main(String args[])
	{
		int arr[]={1,4,6,1,2,4,3};
		FindDuplicates(arr);
	}
	public static void FindDuplicates(int arr[])
	{
		for(int i=0;i<arr.length;i++)
		{
           if (arr[Math.abs(arr[i])]>= 0) // checking the possibility of a repetition
		      arr[Math.abs(arr[i])] = -arr[Math.abs(arr[i])];
		   else
		      System.out.println(Math.abs(arr[i]));
        }
    }
}

