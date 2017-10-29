/*
 * METHOD 2(Use XOR)

  1) XOR all the array elements, let the result of XOR be X1.
  2) XOR all numbers from 1 to n, let XOR be X2.
  3) XOR of X1 and X2 gives the missing number.
 */
package geeksArray;

public class FindMissingElement1
{
	public static void main(String args[])
	{
		int a[]={1,3,4,6,2,7};
		int xor1=a[0],xor2=1;
		for(int i=1;i<a.length;i++)
		{
			xor1=xor1^a[i]; // xor operation on the entire elements of array
		}
		for(int i=2;i<=a.length+1;i++)
			xor2=xor2^i; //xor operation on numbers from 1 to n-1

		System.out.println(xor1^xor2);
	}
}
