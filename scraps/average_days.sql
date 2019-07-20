SELECT plant_id, CASE 
        WHEN COUNT(*) < 2
            THEN 0
        ELSE DATEDIFF(dd, 
                MIN(
                    water_date
                ), MAX(
                    water_date
                )) / (
                COUNT(*) - 
                1
                )
        END AS avgtime_days
FROM waters
GROUP BY plant_id;

select common_name, DATEDIFF(max(waters.water_date), min(waters.water_date)) / (count(waters.water_date)-1) AS average_days 
from waters
JOIN plants ON waters.plant_id = plants.id
group by plant_id;

select common_name, min(waters.water_date), max(waters.water_date), count(water_date) AS num_waters from waters JOIN plants ON waters.plant_id = plants.id group by waters.plant_id;