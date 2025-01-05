CREATE DATABASE `miss_ghana` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;


CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_role` enum('Admin','Commercial','User') DEFAULT 'User',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `admins_mcc` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) DEFAULT 'User',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;


CREATE TABLE `app_downloads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(45) DEFAULT NULL,
  `response` varchar(45) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `app_link` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` text,
  `total_request` int DEFAULT '0',
  `link_type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `banner_gallery` (
  `gallery_id` int NOT NULL AUTO_INCREMENT,
  `gallery_image` text NOT NULL,
  `gallery_description` text NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE `contestants` (
  `contestant_id` int NOT NULL AUTO_INCREMENT,
  `contestant_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vote_count` int DEFAULT '0',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contestant_num` int DEFAULT NULL,
  `full_names` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `contestant_region` varchar(255) DEFAULT NULL,
  `status` enum('Active','not_evicted','Evicted') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Active',
  `age` int DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `contestant_bio` text,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_votes_display` varchar(45) NOT NULL DEFAULT 'True',
  `is_enable_vote` varchar(45) DEFAULT 'True',
  PRIMARY KEY (`contestant_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `contestants_weekly` (
  `contestant_id` int NOT NULL AUTO_INCREMENT,
  `contestant_name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vote_count` int DEFAULT '0',
  `thumbnail` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contestant_num` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `full_names` varchar(255) DEFAULT NULL,
  `category` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `contestant_region` varchar(45) DEFAULT NULL,
  `status` enum('Evicted','Active','not_evicted') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'not_evicted',
  `age` varchar(45) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `contestant_bio` text,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_votes_display` varchar(45) NOT NULL DEFAULT 'True',
  `is_enable_vote` varchar(45) DEFAULT 'True',
  PRIMARY KEY (`contestant_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `news_brief` text NOT NULL,
  `news_image` text NOT NULL,
  `news_date` datetime NOT NULL,
  `news_mediatype` text NOT NULL,
  `news_detail` text NOT NULL,
  `news_vidlink` text NOT NULL,
  `event_status` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;


CREATE TABLE `gallery` (
  `gallery_id` int NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(255) DEFAULT NULL,
  `gallery_image` text,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


CREATE TABLE `live_stream` (
  `stream_id` int NOT NULL AUTO_INCREMENT,
  `video_id` text NOT NULL,
  `push_status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`stream_id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


CREATE TABLE `log_hist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `dashboard_tab` varchar(255) DEFAULT NULL,
  `contestant_tab` varchar(255) DEFAULT NULL,
  `votes_tab` varchar(255) DEFAULT NULL,
  `weekly_data` varchar(255) DEFAULT NULL,
  `raw_data` varchar(255) DEFAULT NULL,
  `various_channels` varchar(255) DEFAULT NULL,
  `vote_channels` varchar(255) DEFAULT NULL,
  `raw_channel_viewer` varchar(255) DEFAULT NULL,
  `ussd_channel_viewer` varchar(255) DEFAULT NULL,
  `web_channel_viewer` varchar(255) DEFAULT NULL,
  `sms_channel_viewer` varchar(255) DEFAULT NULL,
  `android_channel_viewer` varchar(255) DEFAULT NULL,
  `channel_data_export` varchar(255) DEFAULT NULL,
  `eviction_process` varchar(255) DEFAULT NULL,
  `evictee_name` varchar(255) DEFAULT NULL,
  `eviction_time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `otp_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `momo_number` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `warning` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `opt_code` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_num` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vote_count` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `channel` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expired_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `past_queens` (
  `queen_id` int NOT NULL AUTO_INCREMENT,
  `season` varchar(255) NOT NULL,
  `queen_name` varchar(255) NOT NULL,
  `queen_age` varchar(255) NOT NULL,
  `queen_region` varchar(255) NOT NULL,
  `queen_url` text NOT NULL,
  PRIMARY KEY (`queen_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;


CREATE TABLE `service_adds` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) DEFAULT NULL,
  `service_description` varchar(255) DEFAULT NULL,
  `service_thumbnail` varchar(255) DEFAULT NULL,
  `service_video_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `slider` (
  `slider_id` int NOT NULL AUTO_INCREMENT,
  `slider_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `sponsors` (
  `sponsor_id` int NOT NULL AUTO_INCREMENT,
  `sponsor_name` text NOT NULL,
  `sponsor_email` text NOT NULL,
  `sponsor_location` text NOT NULL,
  `sponsor_description` text NOT NULL,
  `sponsor_image` text NOT NULL,
  PRIMARY KEY (`sponsor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;


CREATE TABLE `track_session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_entry` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `initiator` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `full_names` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_num` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_id` int DEFAULT NULL,
  `category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contestant_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vote_count` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `session_level` int DEFAULT NULL,
  `session_tab` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `transactions_completed` (
  `trans_comp_id` int NOT NULL AUTO_INCREMENT,
  `response_code` varchar(45) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_network` varchar(25) DEFAULT NULL,
  `vote_channel` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `cont_id` int DEFAULT NULL,
  `contestant_name` varchar(45) DEFAULT NULL,
  `momo_number` varchar(45) DEFAULT NULL,
  `number_of_votes` int DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `contestant_num` varchar(45) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT NULL,
  `external_transaction_id` varchar(255) DEFAULT NULL,
  `charges` double DEFAULT '0',
  `amount_after_charges` double DEFAULT '0',
  `client_reference` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`trans_comp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `transactions_initiated` (
  `trans_init_id` int NOT NULL AUTO_INCREMENT,
  `response_code` varchar(45) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_status` varchar(45) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `payment_network` varchar(45) DEFAULT NULL,
  `number_of_votes` int DEFAULT NULL,
  `cont_id` int DEFAULT NULL,
  `contestant_name` varchar(45) DEFAULT NULL,
  `contestant_num` varchar(45) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `client_reference` varchar(255) DEFAULT NULL,
  `charges` double DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount_after_charges` double DEFAULT NULL,
  `momo_number` varchar(20) DEFAULT NULL,
  `amount_charged` double DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `device` varchar(45) DEFAULT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `callback` text,
  `visa_status` varchar(45) DEFAULT 'Pending',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_init_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `videos` (
  `video_id` int NOT NULL AUTO_INCREMENT,
  `title` text,
  `sub_title` text,
  `video_url` text,
  `video_thumbnail` text,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;


CREATE TABLE `transactions_initiated_old` (
  `trans_init_id` int NOT NULL AUTO_INCREMENT,
  `response_code` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `client_reference` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `charges` double DEFAULT NULL,
  `amount_after_charges` double DEFAULT NULL,
  `amount_charged` double DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `payment_network` varchar(45) DEFAULT NULL,
  `momo_number` varchar(20) DEFAULT NULL,
  `contestant_name` varchar(45) DEFAULT NULL,
  `number_of_votes` int DEFAULT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `cont_id` int DEFAULT NULL,
  `callback` text,
  PRIMARY KEY (`trans_init_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4924 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
