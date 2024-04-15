-- General Instructions
-- 1.	The .sql files are run automatically, so please ensure that there are no syntax errors in the file. If we are unable to run your file, you get an automatic reduction to 0 marks.
-- Comment in MYSQL 

-- 1
select player_name from player where country_name='England' and batting_hand = 'Left-hand bat' order by player_name asc;

-- 2
SELECT player_name, (2018-year(dob)) as age
FROM player
WHERE bowling_skill = 'Legbreak googly' AND  (2018-year(dob)) >= 28
ORDER BY age DESC, player_name asc;

-- 3
SELECT match_id, toss_winner
FROM matches
WHERE toss_decision = 'bat'
ORDER BY match_id;

-- 4
SELECT over_id ,sum(runs_scored) as runs from batsman_scored where match_id=335987 
group by over_id
having sum(runs_scored) <=7
order by runs desc,over_id;

-- 5
SELECT DISTINCT player_name
FROM player p
INNER JOIN wicket_taken d ON p.player_id = d.player_out
WHERE d.kind_out = 'bowled'
ORDER BY player_name;

-- 6
SELECT m.match_id, t1.name AS team_1, t2.name AS team_2, m.match_winner, m.win_margin
FROM matches m
JOIN team t1 ON m.team_1 = t1.team_id
JOIN team t2 ON m.team_2 = t2.team_id
WHERE m.win_margin >= 60
ORDER BY m.win_margin, m.match_id;

-- 7
SELECT player_name
FROM player
WHERE batting_hand = 'Left-hand bat' AND FLOOR(DATEDIFF('2018-12-02', dob) / 365) < 30
ORDER BY player_name;

-- 8
SELECT match_id, SUM(runs_scored) AS total_runs
FROM batsman_scored
GROUP BY match_id
ORDER BY match_id;

-- 9
SET sql_mode = '';
WITH MaxRunsPerOver AS (
    SELECT match_id,innings_no, over_id, sum(runs_scored) AS net_runs_inover
    FROM batsman_scored
    GROUP BY match_id,innings_no,over_id
)

SELECT mpo.match_id,max(mpo.net_runs_inover),p.player_name
FROM MaxRunsPerOver mpo
JOIN ball_by_ball b ON mpo.match_id = b.match_id AND mpo.innings_no = b.innings_no AND mpo.over_id = b.over_id 
JOIN player p ON b.bowler = p.player_id

group by mpo.match_id
ORDER BY mpo.match_id, mpo.over_id;

-- 10
SELECT p.player_name, COUNT(*) AS number
FROM wicket_taken d
JOIN player p ON d.player_out = p.player_id
WHERE d.kind_out = 'Run out'
GROUP BY p.player_name
ORDER BY number DESC, p.player_name;

-- 11
SELECT kind_out, COUNT(*) AS number
FROM wicket_taken
GROUP BY kind_out
ORDER BY number DESC, kind_out;

-- 12
SELECT t.name, COUNT(*) AS number
FROM matches m
JOIN team t ON m.match_winner = t.team_id
GROUP BY t.name
ORDER BY t.name;

-- 13
SELECT venue
FROM (
    SELECT venue, COUNT(*) AS wides_count
    FROM matches 
    join extra_runs 
    WHERE matches.match_id=extra_runs.match_id and extra_type = 'wides'
    GROUP BY venue
) AS venue_wides
ORDER BY wides_count DESC, venue
LIMIT 1;

-- 14
SELECT venue
FROM (
    SELECT venue, COUNT(*) AS num_wins
    FROM matches 
    WHERE toss_winner=match_winner and toss_decision='field'
    GROUP BY venue
) AS venue_wides
ORDER BY num_wins DESC, venue;








