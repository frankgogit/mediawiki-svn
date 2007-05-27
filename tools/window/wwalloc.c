/*	$NetBSD: wwalloc.c,v 1.6 2003/08/07 11:17:36 agc Exp $	*/

/*
 * Copyright (c) 1983, 1993
 *	The Regents of the University of California.  All rights reserved.
 *
 * This code is derived from software contributed to Berkeley by
 * Edward Wang at The University of California, Berkeley.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. Neither the name of the University nor the names of its contributors
 *    may be used to endorse or promote products derived from this software
 *    without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE REGENTS AND CONTRIBUTORS ``AS IS'' AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED.  IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE
 * FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
 * DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS
 * OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION)
 * HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
 * OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF
 * SUCH DAMAGE.
 */

#include <sys/cdefs.h>
#ifndef lint
#if 0
static char sccsid[] = "@(#)wwalloc.c	8.1 (Berkeley) 6/6/93";
#else
__RCSID("$NetBSD: wwalloc.c,v 1.6 2003/08/07 11:17:36 agc Exp $");
#endif
#endif /* not lint */

#include <stdlib.h>
#include "ww.h"

char **
wwalloc(int row, int col, int nrow, int ncol, int size)
{
	char *p, **pp;
	int i;

	/* fast, call malloc only once */
	pp = (char **)
		malloc((unsigned) sizeof (char **) * nrow + size * nrow * ncol);
	if (pp == 0) {
		wwerrno = WWE_NOMEM;
		return 0;
	}
	p = (char *)&pp[nrow];
	col *= size;
	size /= sizeof (char);		/* paranoid */
	size *= ncol;
	for (i = 0; i < nrow; i++) {
		pp[i] = p - col;
		p += size;
	}
	return pp - row;
}

void
wwfree(char **p, int row)
{
	free((char *)(p + row));
}
