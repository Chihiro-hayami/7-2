-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 4 月 25 日 12:30
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `restaurant`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `body` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `form`
--

INSERT INTO `form` (`id`, `name`, `body`) VALUES
(4, '山田太郎', 'あ'),
(10, 'ちぴ', '小麦アレルギーでも食べられるケーキのあるお店が知りたいです。'),
(13, 'a', 'a');

-- --------------------------------------------------------

--
-- テーブルの構造 `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `station` varchar(20) NOT NULL,
  `effort` text NOT NULL,
  `URL` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `genre`, `address`, `station`, `effort`, `URL`, `created_at`) VALUES
(1, 'WindWordGrill', 'ハワイアン居酒屋', '兵庫県伊丹市', '阪急伊丹駅', 'まな板別、器具洗浄など', 'comingsoon', '2022-04-20 13:52:29'),
(2, 'カッパ', '和食', '大阪府北区', 'JR大阪駅', 'グルテンフリー、個別対応可', 'comingsoon', '2022-04-20 00:05:45'),
(3, 'イタリアン', '洋食', '大阪府東大阪市', 'JR放出駅', 'あああああああああ', 'aaaaa', '2022-03-24 16:48:57'),
(4, '玉将', '中華', '大阪府北区', 'JR大阪駅', 'あああああああああああ', 'aaaaa', '2022-04-20 00:03:51'),
(5, '幸せのパンケーキ', 'カフェ', '大阪府北区', 'JR大阪駅', 'あああああああああああ', 'aaaaa', '2022-03-29 15:20:29'),
(9, 'たこ焼き', '海鮮', '大阪府北区', '梅田駅', 'ああああああああ', 'comingsoon', '2022-04-19 19:14:16'),
(12, 'わらび餅', '和菓子', '大阪府都島', '桜ノ宮駅', 'ああああああああああ', 'comingsoon', '2022-04-19 19:14:52');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(13, 'test@gmail.com', '$2y$10$Jejf3QAzYr1utOCC91reAO1mWJN9uLKc5Om9L6ZPSaOMe2FUI3Vl2'),
(21, 'test@co.jp', '$2y$10$QCTCL9Hq7RQCIdOvyyGLAOytyTeU9VOhaSUeO/2yR17QXik9IyvZq');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- テーブルの AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
