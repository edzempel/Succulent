delimiter //
CREATE TRIGGER avgWaterDays AFTER INSERT ON waters
FOR EACH ROW SET @plantId = waters.plant_id;
BEGIN

	IF (SELECT COUNT(plant_id) from waters where plant_id = @plantId ) = 1
		SET plants.avgWaterDays = 0
        WHERE plants.plant_id = @plantId;
	ELSE
		SET plants.avgWaterDays = (select datediff(max(water_date), min(water_date)) / (count(water_date) -1) AS Average_days from waters where plant_id = @plantId);
	END IF;
END;//
// delimiter ;







delimiter //
CREATE TRIGGER avgWaterDays AFTER INSERT ON waters
FOR EACH ROW SET @plantId = waters.plant_id;
BEGIN
	IF (SELECT COUNT(plant_id) from waters where plant_id = @plantId ) = 1
		UPDATE plants
		SET plants.avg_water_days = 0
        WHERE plants.plant_id = @plantId;
	ELSE
		UPDATE plants
		SET plants.avg_water_days = (select datediff(max(water_date), min(water_date)) / (count(water_date) -1) AS Average_days from waters where plant_id = @plantId);
	END IF;
END;//
// delimiter ;