#include <bits/stdc++.h>
using namespace std;

bool starter(char a)
{

	string ch = " ()[].,=;:/\\\"\'*%^!-+";
	for (int i = 0; i < ch.size(); ++i)
		if (ch[i] == a)
			return true;
	return false;
}

bool found(string a)
{
	bool start = false;
	for (int i = 0; i < a.size(); ++i)
	{
		if (!start)
			if (starter(a[i]))
			{
				start = true;
				continue;
			}
				
		
		if (start)
		{
			if (i < a.size()-2)
			if (a[i] == 'i' and a[i+1] == 'n' and a[i+2] == 't') 
				return true;
			if (i < a.size()-4)
			if (a[i] == 'f' and a[i+1] == 'l' and a[i+2] == 'o' and a[i+3] == 'a' and a[i+4] == 't')
				return true;
                        if (i < a.size()-5)
                        if (a[i] == 'd' and a[i+1] == 'o' and a[i+2] == 'u' and a[i+3] == 'b' and a[i+4] == 'l' and a[i+5] == 'e')
                                return true;
			start = false;
		}

	}
}

int main()
{
	string s, t;
	t = " ";
	while (cin >> s)
	{
		t += s + " ";
	}

	cout << t << endl;
	if (!found(t))
		system("echo 1 >> qualified");

}
