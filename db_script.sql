/* Dt: 12-03-22 */
ALTER TABLE `products` ADD COLUMN `manufacturer_location` varchar(500) NULL AFTER `wholesale_product`;
ALTER TABLE `products` ADD COLUMN `purchase_start_date` datetime NULL AFTER `manufacturer_location`;
ALTER TABLE `products` ADD COLUMN `purchase_end_date` datetime NULL AFTER `purchase_start_date`;


/* Dt: 22-03-22 */
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (NULL, NULL, NULL, NULL, 1, 'CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP');
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (NULL, NULL, NULL, NULL, 1, 'CURRENT_TIMESTAMP', 'CURRENT_TIMESTAMP');
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (9, 'order_shipped', 'Order Shipped', NULL, 1, '2022-03-22 15:40:14', '2022-03-22 15:40:14');
