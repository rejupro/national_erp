-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2021 at 11:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consrtuction2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_classes`
--

CREATE TABLE `account_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acc_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bbrname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbrcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bbrlocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bankaccounts`
--

INSERT INTO `bankaccounts` (`id`, `bid`, `acc_no`, `acc_title`, `bbrname`, `bbrcode`, `bbrlocation`, `debit`, `credit`, `balance`, `uid`, `created_at`, `updated_at`) VALUES
(1, '1', '105451520015', 'Credit', 'Dhanmondi', '1201', '32 Sukrabad', NULL, NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `sort`, `name`, `bname`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'DBBL', 'Dutch Bangla Bank Limited', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '01705645150', 'oli@gmail.com', 'Dhaka, Banglades', NULL, NULL),
(2, 'Mirpur', '01705645150', 'Mirpur@gmail.com', 'Mirpur 10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_stocks`
--

CREATE TABLE `branch_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recv_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deli_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_stocks`
--

INSERT INTO `branch_stocks` (`id`, `branch_id`, `product_id`, `invoice`, `quantity`, `purchase_qty`, `recv_qty`, `rest_qty`, `sold_qty`, `deli_qty`, `return_qty`, `dp_qty`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'PRCS-VNO-', '1618', '2820', '1918', '0', NULL, NULL, NULL, NULL, 'Super Admin', NULL, NULL),
(2, '1', '1', 'PRCS-VNO-', '1618', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Super Admin', NULL, NULL),
(3, '1', '1', 'PRCS-VNO-', '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_transfers`
--

CREATE TABLE `branch_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branch_transfers`
--

INSERT INTO `branch_transfers` (`id`, `branch_id_from`, `branch_id_to`, `product_id`, `quantity`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '1', '100', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RFL', 'RFL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed_money_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'category1', 'category1', '2021-08-11 13:25:05', '2021-08-11 13:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Green', '#f20212', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', 'Bangladesh', '2021-08-11 12:59:09', '2021-08-11 12:59:09');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `sort`, `symbol`, `x_rate`, `default`, `created_at`, `updated_at`) VALUES
(1, 'TAKA', 'BDT', '$', '1', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `grp_id` int(11) NOT NULL,
  `credit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ranking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `status`, `code`, `c_name`, `m_name`, `nid`, `c_num`, `c_phone`, `c_email`, `address`, `s_address`, `district_id`, `zone_id`, `grp_id`, `credit`, `ranking`, `created_at`, `updated_at`) VALUES
(1, 'customer1', '1', 10121, 'Father1', 'Mohter1', '12454545754', '011705645150', '5616494', 'oli@gmail.com', 'Dhaka', 'Dhaka', 1, 1, 1, '10000', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `c__groups`
--

CREATE TABLE `c__groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `c__groups`
--

INSERT INTO `c__groups` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'VIP', 'ssd', '2021-08-11 12:54:47', '2021-08-11 12:54:47'),
(2, 'Group1', 'Nothings', '2021-08-11 13:10:05', '2021-08-11 13:10:05');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Bangladesh', '2021-08-11 13:00:28', '2021-08-11 13:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desg_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `join_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wbrid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenseheads`
--

CREATE TABLE `expenseheads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `e_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_vauchers`
--

CREATE TABLE `expense_vauchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_creadit_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_vaucher_details`
--

CREATE TABLE `expense_vaucher_details` (
  `expense_vaucher_id` int(11) NOT NULL,
  `expense_head_id` int(11) NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `class_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Current Assets', 'Assets', 'Current Assets', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_vouchers`
--

CREATE TABLE `journal_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `narration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_vouchers`
--

INSERT INTO `journal_vouchers` (`id`, `journal_no`, `date`, `project_id`, `narration`, `created_at`, `updated_at`) VALUES
(2, 'JOU10121', '2021-08-12', 1, 'Nothing', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_voucher_details`
--

CREATE TABLE `journal_voucher_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_voucher_id` bigint(20) UNSIGNED NOT NULL,
  `debit_sub_group_id` bigint(20) UNSIGNED NOT NULL,
  `debit_ledger_id` bigint(20) UNSIGNED NOT NULL,
  `debit_amount` double(8,2) NOT NULL,
  `credit_ledger_id` bigint(20) UNSIGNED NOT NULL,
  `credit_sub_group_id` bigint(20) UNSIGNED NOT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_voucher_details`
--

INSERT INTO `journal_voucher_details` (`id`, `journal_voucher_id`, `debit_sub_group_id`, `debit_ledger_id`, `debit_amount`, `credit_ledger_id`, `credit_sub_group_id`, `cheque_no`, `cheque_date`, `ref`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1000.00, 2, 1, NULL, NULL, '1505451', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lcs`
--

CREATE TABLE `lcs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pi_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bene_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lc3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grp_id` int(11) NOT NULL,
  `sub_grp_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `name`, `grp_id`, `sub_grp_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Petty Cash', 1, 1, 'Petty Cash', '2021-08-12 10:15:02', '2021-08-12 10:15:02'),
(2, 'Main Cash', 1, 1, 'Main Cash', '2021-08-12 10:15:28', '2021-08-12 10:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_mobile` int(11) NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `manufacture_name`, `c_person`, `c_mobile`, `c_email`, `address`, `main_product`, `description`, `web`, `rank`, `created_at`, `updated_at`) VALUES
(1, 'Good luck', 'oli ullah', 1705645150, 'oli@gmail.com', '105 Boulevard Jean Jaurès, 92110 Clichy, France\r\n105 Boulevard Jean Jaurès, 92110 Clichy, France', 'PEN', 'Nothing', 'https://axessoft.com/rmconstruction/pages/pur', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_carts`
--

CREATE TABLE `material_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `material_uses`
--

CREATE TABLE `material_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `record_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_person_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_06_09_143108_create_brands_table', 1),
(4, '2021_06_10_055400_create_manufactures_table', 1),
(5, '2021_06_11_050008_create_units_table', 1),
(6, '2021_06_11_103039_create_countries_table', 1),
(7, '2021_06_11_170429_create_transports_table', 1),
(8, '2021_06_12_044837_create_colors_table', 1),
(9, '2021_06_12_081721_create_districts_table', 1),
(10, '2021_06_12_092914_create_zones_table', 1),
(11, '2021_06_12_101242_create_currencies_table', 1),
(12, '2021_06_13_092320_create_account_classes_table', 1),
(13, '2021_06_13_093531_create_groups_table', 1),
(14, '2021_06_13_114614_create_sub_groups_table', 1),
(15, '2021_06_14_123709_create_ledgers_table', 1),
(16, '2021_06_14_193045_create_banks_table', 1),
(17, '2021_06_16_091833_create_categories_table', 1),
(18, '2021_06_16_105257_create_sub_categories_table', 1),
(19, '2021_06_17_050106_create_products_table', 1),
(20, '2021_06_18_175301_create_bankaccounts_table', 1),
(21, '2021_06_19_044114_create_customers_table', 1),
(22, '2021_06_19_092139_create_c__groups_table', 1),
(23, '2021_06_19_095830_create_suppliers_table', 1),
(24, '2021_06_23_190827_create_mobileaccounts_table', 1),
(25, '2021_06_24_200937_create_departments_table', 1),
(26, '2021_06_24_213231_create_progroups_table', 1),
(27, '2021_06_24_213429_create_designations_table', 1),
(28, '2021_06_24_213552_create_prosubgroups_table', 1),
(29, '2021_06_24_213924_create_protypes_table', 1),
(30, '2021_06_24_214050_create_procontructors_table', 1),
(31, '2021_06_24_214404_create_projects_table', 1),
(32, '2021_06_25_113436_create_employees_table', 1),
(33, '2021_06_25_201748_create_leave_types_table', 1),
(34, '2021_06_26_150620_create_expenseheads_table', 1),
(35, '2021_06_27_174347_create_leave_applications_table', 1),
(36, '2021_06_29_001400_create_users_table', 1),
(37, '2021_07_02_111912_create_expense_vauchers_table', 1),
(38, '2021_07_02_113203_create_expense_vaucher_details_table', 1),
(39, '2021_07_08_061200_create_warehouses_table', 1),
(40, '2021_07_13_180842_create_carts_table', 1),
(41, '2021_07_14_194308_create_purchase_details_table', 1),
(42, '2021_07_24_162826_create_purchases_table', 1),
(43, '2021_07_24_163348_create_payments_table', 1),
(44, '2021_07_27_194216_create_product_receipts_table', 1),
(45, '2021_07_31_110626_create_material_carts_table', 1),
(46, '2021_07_31_120728_create_material_uses_table', 1),
(47, '2021_07_31_193041_create_sales_table', 1),
(48, '2021_08_01_063616_create_sales_details_table', 1),
(49, '2021_08_01_064119_create_sales_carts_table', 1),
(50, '2021_08_01_092348_create_sales_payments_table', 1),
(51, '2021_08_03_135158_create_pis_table', 1),
(52, '2021_08_03_135636_create_pi_items_table', 1),
(53, '2021_08_04_194718_create_lcs_table', 1),
(54, '2021_08_05_182727_create_product_deliverys_table', 1),
(55, '2021_08_09_052616_create_branches_table', 1),
(56, '2021_08_11_010000_create_warehouse_stocks_table', 2),
(57, '2021_08_11_180703_create_branch_stocks_table', 3),
(58, '2021_08_10_213958_create_warehouse_transfers_table', 4),
(59, '2021_08_10_162339_create_journal_vouchers_table', 5),
(60, '2021_08_10_162609_create_journal_voucher_details_table', 6),
(61, '2021_08_02_201057_create_payment_vauchers_table', 7),
(62, '2021_08_03_113115_create_payment_vaucher_details_table', 8),
(63, '2021_08_12_214406_create_branch_transfers_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mobileaccounts`
--

CREATE TABLE `mobileaccounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doposit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widrawn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pur_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chbid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_bid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pur_invoice`, `order_no`, `payable`, `balance`, `paid`, `due`, `purchase_date`, `bank_id`, `cheque_no`, `cheque_date`, `caname`, `chbid`, `w_bid`, `mobid`, `trxid`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PRCS-VNO-', '1', '5076', '5076', '0', '5076', '2021-08-11', '1', '15114', '2021-08-12', NULL, NULL, NULL, NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(2, 'PRCS-VNO-1', '2', '5076', '4576', '500', '4576', '2021-08-12', NULL, NULL, NULL, 'oli', '1', '1', NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(3, 'PRCS-VNO-2', '3', '44200', '0', '44200', '0', '2021-08-12', '1', '999999', '2021-08-19', NULL, NULL, NULL, NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(4, 'PRCS-VNO-2', '5', '401150', '0', '401150', '0', '2021-08-12', NULL, NULL, NULL, 'Sub-Group Name-1', '1', '1', NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(5, 'PRCS-VNO-2', '6', '401150', '0', '401150', '0', '2021-08-12', NULL, NULL, NULL, 'Sub-Group Name-1', '1', '1', NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(6, 'PRCS-VNO-2', '1', '401150', '0', '401150', '0', '2021-08-12', NULL, NULL, NULL, 'Sub-Group Name-1', '1', '1', NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL),
(7, 'PRCS-VNO-2', '26', '401150', '0', '401150', '0', '2021-08-12', '1', '98989898', '2021-08-19', NULL, NULL, NULL, NULL, NULL, 'Super Admin', '2021-08-12 19:25:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_vauchers`
--

CREATE TABLE `payment_vauchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bank_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mobile_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_vaucher_details`
--

CREATE TABLE `payment_vaucher_details` (
  `payment_voucher_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pis`
--

CREATE TABLE `pis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_terms` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pi_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pi_items`
--

CREATE TABLE `pi_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `procontructors`
--

CREATE TABLE `procontructors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procontructors`
--

INSERT INTO `procontructors` (`id`, `code`, `name`, `mobile`, `email`, `address`, `note`, `status`, `brid`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'Con1010', 'oli ullah', '01705645150', 'oli@gmail.com', 'Dhaka', 'Special', 'Active', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `manufac_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `pur_scan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `w_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avater` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `parent_id`, `cat_id`, `sub_cat_id`, `brand_id`, `manufac_id`, `unit_id`, `pur_scan`, `country_id`, `status`, `certificate`, `min_stock`, `model`, `cost`, `brand_no`, `price`, `w_day`, `barcode`, `description`, `avater`, `created_at`, `updated_at`) VALUES
(1, 'Ciment', '10121', NULL, 1, 1, 1, 1, 1, 'Ciment', 1, '1', 'ISO 9001', '2918', '10', '450', '10', '500', '0', '100', 'nothing', 'C:\\xampp\\tmp\\php97F3.tmp', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_deliverys`
--

CREATE TABLE `product_deliverys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deli_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sales_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deli_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `now_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `u_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_receipts`
--

CREATE TABLE `product_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pur_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `challan_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rcv_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rcv_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `now_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_receipts`
--

INSERT INTO `product_receipts` (`id`, `pur_invoice`, `order_no`, `challan_no`, `rcv_date`, `note`, `item_id`, `item_name`, `purchase_qty`, `rcv_qty`, `rest_qty`, `now_qty`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PRCS-VNO-', '1', '5', '2021-08-12', 'nothing', '1', 'Ciment', '10', '9', '0', '109', 'Super Admin', NULL, NULL),
(2, 'PRCS-VNO-1', '2', '10', '2021-08-12', 'Warehouse', '1', 'Ciment', '10', '9', '0', '118', 'Super Admin', NULL, NULL),
(10, 'PRCS-VNO-2', '22', 'oio0-09999', '2021-08-19', 'jjiijijijijij', '1', 'Ciment', '100', '100', '0', '2118', 'Super Admin', NULL, NULL),
(11, 'PRCS-VNO-2', '22', 'oio0-09999', '2021-08-19', 'jjiijijijijij', '1', 'Ciment', '800', '800', '0', '2918', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progroups`
--

CREATE TABLE `progroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `progroups`
--

INSERT INTO `progroups` (`id`, `name`, `code`, `description`, `brid`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'group1', '10121', 'nothing', NULL, NULL, NULL, NULL),
(2, 'subgroup1', '10000', 'nothing', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pgid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pgsid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cperson` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prjdetails` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prjamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prjexamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prjtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coamount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `pgid`, `pgsid`, `project_id`, `name`, `address`, `cperson`, `cnumber`, `prjdetails`, `prjamount`, `prjexamount`, `prjtype`, `coid`, `coamount`, `client`, `status`, `uid`, `brid`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 'ED144', 'Diganta Dish Cable Network', 'Dhaka', 'oli', NULL, NULL, NULL, NULL, NULL, '1', NULL, '1', 'Start', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prosubgroups`
--

CREATE TABLE `prosubgroups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pgid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prosubgroups`
--

INSERT INTO `prosubgroups` (`id`, `pgid`, `name`, `code`, `description`, `brid`, `uid`, `created_at`, `updated_at`) VALUES
(1, '1', 'subgroup1', '1212', NULL, NULL, NULL, NULL, NULL),
(2, '2', 'oli ullah', '1212', 'sads', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

CREATE TABLE `protypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`id`, `name`, `description`, `brid`, `uid`, `created_at`, `updated_at`) VALUES
(1, 'type1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pur_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pi_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pi_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `pur_invoice`, `payable`, `balance`, `paid`, `purchase_date`, `next_date`, `product_store`, `ref`, `project_id`, `note`, `lc_no`, `pi_no`, `lc_value`, `lc_date`, `pi_date`, `lc_bank`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PRCS-VNO-', '5076', '5076', '0', '2021-08-11', '2021-08-12', 'BR-1', '54554', '1', 'Nothing', '4646', '84644', '50000', '2021-08-12', '2021-08-12', '1', 'Super Admin', NULL, NULL),
(2, 'PRCS-VNO-1', '5076', '4576', '500', '2021-08-12', '2021-08-12', 'WH-1', '15452', '1', 'tet', '65655', '5656565', '50000', '2021-08-12', '2021-08-12', '1', 'Super Admin', NULL, NULL),
(22, 'PRCS-VNO-2', '401150', '0', '401150', '2021-08-12', '2021-08-12', 'WH-2', '767676767', '1', 'Note-111', '7899798', '989897787', '401150', '2021-08-12', '2021-08-14', '1', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchase_track` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed_money_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_track`, `item_id`, `item_name`, `cost`, `quantity`, `price`, `company_name`, `supplier_id`, `supplier_name`, `color`, `total`, `discount`, `discount_amount`, `vat`, `vat_amount`, `tax`, `tax_amount`, `ait`, `ait_amount`, `other_amount`, `speed_money_amount`, `freight_amount`, `fraction_discount_amount`, `grand_total`, `created_by`, `cookie_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PRCS-VNO-', '1', 'Ciment', '450', '10', '4500', 'oli', '1', 'Supplier1', 'red', '4500', '10', '450', '5', '225', '10', '450', '6', '270', '41', '40', '20', '20', '5076', 'Super Admin', 'LDBiDbx9qCzMxqLL5bSgAbVi28DU2xQm9NC1T2IP', '0', NULL, NULL),
(2, 'PRCS-VNO-1', '1', 'Ciment', '450', '10', '4500', 'oli', '1', 'Supplier1', 'red', '4500', '10', '450', '5', '225', '10', '450', '6', '270', '41', '40', '20', '20', '5076', 'Super Admin', 'Qqi1ROpD6MtVZbhvExwOiYxvrttbE762K8xPeEUz', '0', NULL, NULL),
(3, 'PRCS-VNO-2', '1', 'Ciment', '450', '100', '45000', '123456789', '1', 'Supplier1', 'red', '45000', '10', '4500', '2', '900', '3', '1350', '2', '900', '100', '300', '200', '50', '44200', 'Super Admin', 'yYpMJ4kSEvoslsGFD3PmxKPB9m0uK1NpPMTQuXs2', '0', NULL, NULL),
(4, 'PRCS-VNO-2', '1', 'Ciment', '450', '800', '360000', 'oli', '1', 'Supplier1', 'red', '360000', '10', '36000', '2', '7200', '3', '10800', '4', '14400', '100', '300', '200', '50', '356950', 'Super Admin', 'yYpMJ4kSEvoslsGFD3PmxKPB9m0uK1NpPMTQuXs2', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_store` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pi_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pi_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_carts`
--

CREATE TABLE `sales_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed_money_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_track` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ait_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed_money_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freight_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_discount_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cookie_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_payments`
--

CREATE TABLE `sales_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chbid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_bid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trxid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `cat_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SubCategory1', '1', 'SubCategory1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_groups`
--

CREATE TABLE `sub_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grp_id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_groups`
--

INSERT INTO `sub_groups` (`id`, `name`, `grp_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Cash At Hand', 1, 'Cash At Hand', '2021-08-12 10:14:05', '2021-08-12 10:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `under_id` int(11) NOT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_limit` int(11) NOT NULL,
  `cgrp_id` int(11) NOT NULL,
  `ranking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `status`, `code`, `c_name`, `c_num`, `c_phone`, `under_id`, `c_email`, `credit_limit`, `cgrp_id`, `ranking`, `address`, `f_address`, `created_at`, `updated_at`) VALUES
(1, 'Supplier1', '1', 1010, 'Father1', '01705645150', '5616494', 1, 'oli@gmail.com', 10000, 1, '0', 'Dhaka', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transports`
--

CREATE TABLE `transports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'kg', 'kg', '2021-08-11 12:56:58', '2021-08-11 12:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `name`, `bname`, `email`, `password`, `brand_id`, `status`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Super Admin', 'বিডি সফট', 'superadmin@rmc.com', '$2y$10$KqZllAtNiSqF1Ur9uyUH7eibrEWu4FNn0O6M5RNKSul0ldDY8lzEm', '1', '007', 'manage_project, daily_process, purchase, material_use, inventory, product, on, account, financial, payroll, bank, user_role, report', NULL, '2021-07-05 13:00:28', '0000-00-00 00:00:00'),
(2, '2', 'S.M Shuvo', 'শুভ', 'smshuvo1612@gmail.com', '$2y$10$KqZllAtNiSqF1Ur9uyUH7eibrEWu4FNn0O6M5RNKSul0ldDY8lzEm', '1', '1', 'manage_project, daily_process, purchase, material_use, inventory, product, master, account, financial, payroll, bank, user_role, report', NULL, '2021-07-05 13:28:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `branch_id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, '1', 'Dhanmondi', '01705645150', 'oli@gmail.com', 'Dhaka', NULL, NULL),
(2, '1', 'Golistan', '01705645867', 'admin@gmail.com', 'Golistan Gol Chottor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_stocks`
--

CREATE TABLE `warehouse_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouses_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recv_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rest_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deli_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dp_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_stocks`
--

INSERT INTO `warehouse_stocks` (`id`, `warehouses_id`, `product_id`, `invoice`, `quantity`, `purchase_qty`, `recv_qty`, `rest_qty`, `sold_qty`, `deli_qty`, `return_qty`, `dp_qty`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2', '1', 'PRCS-VNO-2', '600', '900', '900', '0', NULL, NULL, NULL, NULL, 'Super Admin', '2021-08-12 21:26:32', NULL),
(2, '2', '2', '2', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Super Admin', '2021-08-12 21:26:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_transfers`
--

CREATE TABLE `warehouse_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_transfers`
--

INSERT INTO `warehouse_transfers` (`id`, `warehouse_id_from`, `warehouse_id_to`, `product_id`, `quantity`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '1', '100', 'Super Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `district`, `zone`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'Dhanmondi', '2021-08-11 13:01:08', '2021-08-11 13:01:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_classes`
--
ALTER TABLE `account_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_stocks`
--
ALTER TABLE `branch_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_transfers`
--
ALTER TABLE `branch_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c__groups`
--
ALTER TABLE `c__groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenseheads`
--
ALTER TABLE `expenseheads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_vauchers`
--
ALTER TABLE `expense_vauchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_vouchers`
--
ALTER TABLE `journal_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_voucher_details`
--
ALTER TABLE `journal_voucher_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lcs`
--
ALTER TABLE `lcs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_carts`
--
ALTER TABLE `material_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_uses`
--
ALTER TABLE `material_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobileaccounts`
--
ALTER TABLE `mobileaccounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_vauchers`
--
ALTER TABLE `payment_vauchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pis`
--
ALTER TABLE `pis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_items`
--
ALTER TABLE `pi_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procontructors`
--
ALTER TABLE `procontructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_deliverys`
--
ALTER TABLE `product_deliverys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_receipts`
--
ALTER TABLE `product_receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progroups`
--
ALTER TABLE `progroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prosubgroups`
--
ALTER TABLE `prosubgroups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_carts`
--
ALTER TABLE `sales_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_payments`
--
ALTER TABLE `sales_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_groups`
--
ALTER TABLE `sub_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_stocks`
--
ALTER TABLE `warehouse_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warehouse_transfers`
--
ALTER TABLE `warehouse_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_classes`
--
ALTER TABLE `account_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branch_stocks`
--
ALTER TABLE `branch_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch_transfers`
--
ALTER TABLE `branch_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `c__groups`
--
ALTER TABLE `c__groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenseheads`
--
ALTER TABLE `expenseheads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_vauchers`
--
ALTER TABLE `expense_vauchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `journal_vouchers`
--
ALTER TABLE `journal_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `journal_voucher_details`
--
ALTER TABLE `journal_voucher_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lcs`
--
ALTER TABLE `lcs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `material_carts`
--
ALTER TABLE `material_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_uses`
--
ALTER TABLE `material_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `mobileaccounts`
--
ALTER TABLE `mobileaccounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_vauchers`
--
ALTER TABLE `payment_vauchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pis`
--
ALTER TABLE `pis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pi_items`
--
ALTER TABLE `pi_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `procontructors`
--
ALTER TABLE `procontructors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_deliverys`
--
ALTER TABLE `product_deliverys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_receipts`
--
ALTER TABLE `product_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `progroups`
--
ALTER TABLE `progroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prosubgroups`
--
ALTER TABLE `prosubgroups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `protypes`
--
ALTER TABLE `protypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_carts`
--
ALTER TABLE `sales_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_payments`
--
ALTER TABLE `sales_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_groups`
--
ALTER TABLE `sub_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_stocks`
--
ALTER TABLE `warehouse_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse_transfers`
--
ALTER TABLE `warehouse_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
