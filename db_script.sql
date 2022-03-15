/* Dt: 12-03-22 */
ALTER TABLE `products` ADD COLUMN `manufacturer_location` varchar(500) NULL AFTER `wholesale_product`;
ALTER TABLE `products` ADD COLUMN `purchase_start_date` datetime NULL AFTER `manufacturer_location`;
ALTER TABLE `products` ADD COLUMN `purchase_end_date` datetime NULL AFTER `purchase_start_date`;
