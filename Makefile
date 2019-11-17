
import-db:
	gunzip -c data/dbusinesstest.sql.gz > data/data.sql
	docker exec -i dbusinesstest_mysql mysql -udrupal -pdrupal drupal < data/data.sql
	rm -rf data/data.sql