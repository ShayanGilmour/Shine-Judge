#include <bits/stdc++.h>
using namespace std;
set <long double> s;
int main()
{
	long double d = 1;
	long double dd = -1;
	long double t;
	for (int i = 1; i < 6; ++i)
	{
		cin >> t;
		s.insert(t);
		d = min(d, t);
		dd= max(dd, t);
	}

	if (int(s.size()) < 3)
	{
//                system ("echo #1 >> /var/www/html/result");
		return 0;
	}

	if (dd < (long double)(0.6))
	{
//              system ("echo #2 >> /var/www/html/result");
		return 0;
	}
	if (d < 0.9)
		system("touch goodanswer");
        
//	system ("echo #3 >> /var/www/html/result");

}
