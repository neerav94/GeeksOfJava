/*
 * Two elements whose closest_sum is closest to zero
 * link: http://www.geeksforgeeks.org/two-elements-whose-closest_sum-is-closest-to-zero/
 */
package geeksArray;
import java.util.Arrays;
public class ClosestToZero
{
    public static void main(String args[])
	{
		int arr[]={2,7,-10,15,-25,20,-9};
		FindClosest(arr);
	}
	public static void FindClosest(int arr[])
	{
		Arrays.sort(arr); //Sorts the array in ascending order
		int l=0,r=arr.length-1;
		int min_left=0,min_right=0; //variable to store the two numbers leading to minimum closest_sum
		int closest_sum=Integer.MAX_VALUE; //variable to store the minimum closest_sum
		while(l<r)
		{
			int temp=arr[l]+arr[r]; //temporary variable to store the closest_sum
			if(Math.abs(temp)<Math.abs(closest_sum)) //if the value of temp is less than the minimum closest_sum
			{	closest_sum=temp;
				min_left=arr[l];
				min_right=arr[r];
			}
			if(temp>0) //if temp is positive, then decrement r to get closer to zero or make it less positive
				r--;
			else
				l++; //if temp is negative, then increment l to get closer to zero or make it less negative

		}
		System.out.println("Closest Pair: "+"("+min_left+", "+min_right+")");
	}
}
