/* Dt: 12-03-22 */
ALTER TABLE `products` ADD COLUMN `manufacturer_location` varchar(500) NULL AFTER `wholesale_product`;
ALTER TABLE `products` ADD COLUMN `purchase_start_date` datetime NULL AFTER `manufacturer_location`;
ALTER TABLE `products` ADD COLUMN `purchase_end_date` datetime NULL AFTER `purchase_start_date`;


/* Dt: 22-03-22 */
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (7, 'order_confirm', 'Confirm Order', NULL, 1, '2022-03-22 15:34:58', '2022-03-22 15:35:04');
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (8, 'order_cancel', 'Cancel Order', NULL, 1, '2022-03-22 15:37:44', '2022-03-22 15:37:48');
INSERT INTO `sms_templates`(`id`, `identifier`, `sms_body`, `template_id`, `status`, `created_at`, `updated_at`) VALUES (9, 'order_shipped', 'Order Shipped', NULL, 1, '2022-03-22 15:40:14', '2022-03-22 15:40:14');


/* Dt: 28-03-22 */
ALTER TABLE `users` ADD COLUMN `joined_community_id` int(11) NULL AFTER `remaining_uploads`;
ALTER TABLE `users` MODIFY COLUMN `joined_community_id` int(11) NULL DEFAULT 0 AFTER `remaining_uploads`;


/* Dt: 01-04-22 */
ALTER TABLE `users` ADD COLUMN `referral_key` varchar(255) NULL AFTER `joined_community_id`;

/* Dt: 06-04-22 */
ALTER TABLE `products`
ADD COLUMN `secondary_unit` varchar(20) NULL AFTER `unit`,
MODIFY COLUMN `min_qty` double(20, 3) NOT NULL DEFAULT 1 AFTER `unit`;

/* Dt: 14-04-22 */
ALTER TABLE `product_stocks`
ADD COLUMN `seller_id` int(11) NULL AFTER `image`,
ADD COLUMN `est_shipping_days` int(11) NULL DEFAULT NULL AFTER `seller_id`,
ADD COLUMN `purchase_start_date` datetime(0) NULL DEFAULT NULL AFTER `est_shipping_days`,
ADD COLUMN `purchase_end_date` datetime(0) NULL DEFAULT NULL AFTER `purchase_start_date`;

/* Dt: 28-04-22 */
ALTER TABLE `carts` ADD COLUMN `product_stock_id` int(11) NULL AFTER `product_id`;
ALTER TABLE `order_details` ADD COLUMN `product_stock_id` int(11) NULL AFTER `product_id`;

/* Dt: 19-05-22 */
ALTER TABLE `products` ADD COLUMN `parent_category_id` int(11) NOT NULL AFTER `user_id`;
ALTER TABLE `products` ADD COLUMN `sub_category_id` int(11) NOT NULL AFTER `parent_category_id`;

/* Dt: 24-05-22 */
ALTER TABLE `products` ADD COLUMN `variation` varchar(255) NULL AFTER `category_id`;
