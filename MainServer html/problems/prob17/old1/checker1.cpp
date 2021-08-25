#include <bits/stdc++.h>
using namespace std;
set <long double> s;
int main()
{
	long double d = -1;
	long double t;
	for (int i = 1; i < 21; ++i)
	{
		cin >> t;
		s.insert(t);
		d = min(d, t);
	}

	if (int(s.size()) < 15)
		return 0;

	if (d < 1e-1)
		system("touch goodanswer");
}
