-- W2 POSSE課題：index.html の区画7〜11と同じ結果を返す SQL を書く
-- 書いた SQL は db コンテナの psql（docker compose exec db psql -U posse -d timetable）で実行し、
-- 表示が index.html の区画と一致することを確かめてから書くこと
-- 曜日（day）は数字のまま返してよい

-- 区画7：すべての授業と教室の情報（科目コードの順）
SELECT 
    code AS 科目コード,
    name AS 授業名,
    teacher AS 担当教員,
    day AS 曜日,
    period AS 時限,
    room AS 教室
FROM courses
ORDER BY code ASC;

-- 区画8：曜日ごとの授業数（曜日の順）
SELECT 
    day AS 曜日,
    COUNT(*) AS 授業数
FROM courses
GROUP BY day
ORDER BY day ASC;

-- 区画9：建物ごとの授業数と合計単位（建物名の順）
select 
    SUBSTRING(room, 1, 1) AS 建物,
    COUNT(*) AS 授業数,
    SUM(credits) AS 合計単位
FROM courses
GROUP BY SUBSTRING(room, 1, 1)
ORDER BY 建物 ASC;

-- 区画10：授業を3つ以上担当している教員（授業数の多い順、同数なら名前の順）
SELECT 
    teacher AS 担当教員,
    COUNT(*) AS 授業数
FROM courses
GROUP BY teacher
HAVING COUNT(*) >= 3
ORDER BY 授業数 DESC, 担当教員 ASC;     

-- 区画11：授業が1つも入っていない教室（教室コードの順）