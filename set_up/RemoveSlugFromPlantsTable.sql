/*
Removing Slug from Plants table. -YV

*/

USE succulent_cms;

alter table plants
drop slug;

select * from plants;

