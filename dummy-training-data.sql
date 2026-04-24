INSERT INTO memberships (user_id, training_id, start_date)
SELECT 
    b.user_id,

    CASE 
        WHEN b.type = 'student' THEN 6
        ELSE (b.user_id + MONTH(b.start_date)) % 5 + 1
    END AS training_id,

    DATE_ADD(b.start_date, INTERVAL (b.user_id % 28) DAY)

FROM (
    SELECT 
        u.user_id,
        CASE 
            WHEN u.user_id % 5 = 0 THEN 'student'
            ELSE 'regular'
        END AS type,

        DATE_ADD('2023-01-01', INTERVAL (u.user_id % 36) MONTH) AS churn_date,

        RAND() AS pause_chance,

        m.start_date
    FROM users u
    CROSS JOIN (
        SELECT DATE('2023-01-01') + INTERVAL (a.a + (10 * b.a)) MONTH AS start_date
        FROM 
            (SELECT 0 a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
             UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) a,
            (SELECT 0 a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
             UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) b
        WHERE DATE('2023-01-01') + INTERVAL (a.a + (10 * b.a)) MONTH <= '2026-03-01'
    ) m
) b

WHERE b.start_date <= b.churn_date

AND (
    b.pause_chance >= 0.3
    OR (b.user_id + MONTH(b.start_date)) % 4 != 0
);