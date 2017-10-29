/* URl-http://www.geeksforgeeks.org/find-the-missing-number/
 * METHOD 1(Use sum formula)
Algorithm:

1. Get the sum of numbers
       total = n*(n+1)/2
2  Subtract all the numbers from sum and
   you will get the missing number.
 */
package geeksArray;

public class FindMissingElement2
{
	public static void main(String args[])
	{
		int a[]={1,3,4,6,2,7};
		int sum1=0;
		for(int i:a)
			sum1+=i;
		int sum2=(a.length+1)*(a.length+1+1)/2;
		System.out.println(sum2-sum1);
	}
}
