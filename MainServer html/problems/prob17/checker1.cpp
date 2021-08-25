#include <bits/stdc++.h>
using namespace std;
set <long double> s;
int main()
{
	long double d = 1;
	long double dd = -1;
	long double t;
	bool flag1 = true;
	bool flag2 = true;
	long double prev1 = 0;
	long double prev2 = 10;
	for (int i = 1; i < 21; ++i)
	{
		cin >> t;
		s.insert(t);
		d = min(d, t);
		dd= max(dd, t);
		
		if (flag1)
			if (t >= prev1)
				prev1 = t;
		
		if (flag2)
			if (t <= prev2)
				prev2 = t;
		
		if (t < prev1)
			flag1 = false;
		if (t > prev2)
			flag2 = false;
	}

	if (flag1 or flag2)
	{
//		system ("echo #1 >> /var/www/html/result");
		return 0;
	}

	if (int(s.size()) < 15)
	{
//                system ("echo #2 >> /var/www/html/result");
		return 0;
	}

	if (dd < (long double)(0.8))
	{
//                system ("echo #3 >> /var/www/html/result");
		return 0;
	}
	if (d < (long double)(0.5))
		system("touch goodanswer");

                
//	system ("echo #4 >> /var/www/html/result");

}
