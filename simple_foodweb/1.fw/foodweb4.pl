%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
% A simplified food-web data used with the new version of
%  Meta-interpretive Learning (MIL)
%
% ---------------------------------------------------------------------
% 
% The task is to learn non-ground and ground hypotheses (including the 
%  food-web structure below) from up/down abundance data of 6 species  
%  (a, b, c, d, e, and f) from 4 sites (s1, s2, s3 and s4)
%
%     a
%    / \
%   b   c
%  / \   \
% d   e   f
%
% Results
%% learning down/2
%% clauses: 8
%% clauses: 9
%% clauses: 10
%down(d,s4).
%down(d,s3).
%down(c,s2).
%down(c,s1).
%down(A,B):-down_1(A,C),down(C,B).
%down_1(f,c).
%down_1(e,d).
%down_1(b,d).
%down_1(a,d).
%down_1(a,c).
%true 
%118.093920049 seconds
%X = 118.093920049.

:- use_module('../metagol').

%% METAGOL SETTINGS
%metagol:max_clauses(10).
metagol:max_clauses(20).
metagol:min_clauses(8).

%% background knowledge, 
bigger(a, b). 
bigger(a, c).
bigger(a, d).
bigger(a, e).
bigger(a, f).
bigger(b, c).
bigger(b, d).
bigger(b, e).
bigger(b, f).
bigger(c, d).
bigger(c, e).
bigger(c, f).


%% tell metagol to use the BK
prim(bigger/2).

%% metarules
metarule([down,Q],([down,A,B]:-[[Q,A,C], @term_gt(A,C), [down,C,B]])).

metarule([P,A,B],([P,A,B]:-[])).

term_gt(A,B):-
  ground(A),
  A@>B.
term_lt(A,B):-
  ground(A),
  A@<B.


%% learn 'down' 
a :-
    Pos = [
	down(a,s1),
	down(a,s2),
	down(a,s3),
	down(a,s4),
	down(b,s3),
	down(b,s4),
	down(c,s1),
	down(c,s2),
	down(d,s3),
	down(d,s4)
%	down(e, s3),
%	down(e, s4),
%	down(f, s1), 
%	down(f, s2)
    ],
    Neg = [
	down(b,s1),
	down(b,s2),
	down(c,s3),
	down(c,s4),
	down(d,s1),
	down(d,s2),
	down(e,s1),
	down(e,s2),
	down(f,s3),
	down(f,s4)
    ],
    learn(Pos,Neg,Prog),
    pprint(Prog).

%% example of a failure

%  (learn(Pos,Neg,_Prog) -> false; writeln('failed to learn a theory')).
