:- use_module('../metagol').

%% tell metagol to use the BK
prim(mother/2).
prim(father/2).

%% metarules
metarule([P,Q],([P,A,B]:-[[Q,A,B]])).
metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]])).

%% background knowledge
mother(allison,penelope).
mother(allison,david).
mother(penelope,amelia).
mother(linda,gavin).
father(steve,penelope).
father(steve,david).
father(gavin,amelia).
father(david,spongebob).
