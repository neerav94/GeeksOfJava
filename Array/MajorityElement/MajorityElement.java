/* URL-http://www.geeksforgeeks.org/majority-element/
 * Majority Element
Majority Element: A majority element in an array A[] of size n is an element that appears more than n/2 times (and hence there is at most one such element).

O(n) approach using HashMap
 */
package geeksArray;
import java.util.*;
public class MajorityElement
{
	public static void main(String args[])
	{
		int a[]={1,5,2,6,1,1,2,1,1,2,1};
		int result= majority(a);
		System.out.println(result ==-1 ? "no majority number" : "majority number is "+ result );
	}

	public static int majority(int arr[])
	{
		Map<Integer,Integer> hm=new HashMap<Integer,Integer>();
		for(int i=0;i<arr.length;i++)
		{
			if(hm.containsKey(arr[i]))
			{
				int newCount=hm.get(arr[i]);
				newCount++;
				hm.put(arr[i], newCount);
				if(newCount>(arr.length/2))
					return arr[i];
			}
			else
				hm.put(arr[i],1);
		}
		return -1;
	}
}
