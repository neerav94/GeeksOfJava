/* URL-http://www.geeksforgeeks.org/largest-sum-contiguous-subarray/
 * Kadane’s Algorithm:

Initialize:
    max_prev = 0
    max_new = 0

Loop for each element of the array
  (a) max_new = max_new + a[i]
  (b) if(max_new < 0)
            max_new = 0
  (c) if(max_prev < max_new)
            max_prev = max_new
return max_prev
 */
package geeksArray;

public class LargestContiguousArray
{
	public static void main(String args[])
	{
		int a[]={-2, -3, 4, -1, -2, 1, 5, -3};
		int max_prev=0;
		int max_new=0;

		for(int i=0;i<a.length;i++)
		{
			max_new+=a[i];
			if(max_new<0)
				max_new=0;
			if(max_prev<max_new)
				max_prev=max_new;
		}
		System.out.println(max_prev);
	}
}
