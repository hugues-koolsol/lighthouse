# lighthouse score for pwa
A php program to compute the score of pwa according to the lighthouse score.
This program has to be run on a localhost php environment.
It runs several times google chrome (canary) audit for all urls that are in an array at the beginning of the program.

The global score I have chosen is computed like this : 10 * pwa score   +   4 * performance score   +   3 * accessibility score   +   2 * best practices score   +   1 * seo

I did set a tolerance for performance for two reasons:

   1°) lighthouse is a little inconstant when you exceed a score of 95.
   
   2°) in the case of a pwa, the first loading can be a little slow but the following ones are very fast.<br />
   
As a result, a score >= 95 is considered to be equal to 100.


Some pwa have a 💯 for all the lighthouse scores : pwa, performance, accessibility, best-practice and seo . 
It is not very easy to get a 💯 for all these scores but some can reach this challenge 💪 :-)

See the result here : http://www.mypitself.com/lighthouse-score-rank-for-pwa.html

or there : https://blog.koolsol.app/article-classement-lighthouse.php

Do not forget to play koolsol ;-) https://www.koolsol.com/

