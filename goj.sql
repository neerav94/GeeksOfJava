-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 05:33 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goj`
--

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `Domain_Name` varchar(30) NOT NULL,
  `Domain_ID` int(11) NOT NULL,
  PRIMARY KEY (`Domain_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`Domain_Name`, `Domain_ID`) VALUES
('Stacks', 1),
('Queues', 2),
('Linked_List', 3),
('Arrays', 4);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qid` varchar(4) NOT NULL,
  `ques_desc` varchar(200) NOT NULL,
  `algo` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `type` varchar(2) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `domain_id` int(2) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qid`, `ques_desc`, `algo`, `code`, `type`, `heading`, `domain_id`) VALUES
('a1', './Array/ClosestToZero/description.txt', './Array/ClosestToZero/ClosestToZero.txt', './Array/ClosestToZero/ClosestToZero.java', 'E', './Array/ClosestToZero/heading.txt', 1),
('a2', './Array/Duplicates/description.txt', './Array/Duplicates/Duplicates.txt', './Array/Duplicates/Duplicates.java', 'E', './Array/Duplicates/heading.txt', 1),
('a3', './Array/FindMissingElement1/description.txt', './Array/FindMissingElement1/FindMissingElement1.txt', './Array/FindMissingElement1/FindMissingElement1.java', 'E', './Array/FindMissingElement1/heading.txt', 1),
('a4', './Array/FindMissingElement2/description.txt', './Array/FindMissingElement2/FindMissingElement2.txt', './Array/FindMissingElement2/FindMissingElement2.java', 'E', './Array/FindMissingElement2/heading.txt', 1),
('a5', './Array/LargestContiguousArray/description.txt', './Array/LargestContiguousArray/LargestContiguousArray.txt', './Array/LargestContiguousArray/LargestContiguousArray.java', 'E', './Array/LargestContiguousArray/heading.txt', 1),
('a6', './Array/Leader/description.txt', './Array/Leader/Leader.txt', './Array/Leader/Leader.java', 'E', './Array/Leader/heading.txt', 1),
('a7', './Array/MajorityElement/description.txt', './Array/MajorityElement/MajorityElement.txt', './Array/MajorityElement/MajorityElement.java', 'E', './Array/MajorityElement/heading.txt', 1),
('q1', './Queue/Queue/Easy/GenerateBinaryNumber/description.txt', './Queue/Queue/Easy/GenerateBinaryNumber/GenerateBinaryNumber.txt', './Queue/Queue/Easy/GenerateBinaryNumber/GenerateBinaryNumber.java', 'E', './Queue/Queue/Easy/GenerateBinaryNumber/heading.txt', 2),
('q2', './Queue/Queue/Easy/QueueIntroduction/description.txt', './Queue/Queue/Easy/QueueIntroduction/QueueIntroduction.txt', './Queue/Queue/Easy/QueueIntroduction/QueueIntroduction.java', 'E', './Queue/Queue/Easy/QueueIntroduction/heading.txt', 2),
('q3', './Queue/Queue/Medium/Dequeue/description.txt', './Queue/Queue/Medium/Dequeue/Dequeue.txt', './Queue/Queue/Medium/Dequeue/Dequeue.java', 'M', './Queue/Queue/Medium/Dequeue/heading.txt', 2),
('q4', './Queue/Queue/Medium/PriorityQueue/description.txt', './Queue/Queue/Medium/PriorityQueue/PriorityQueue.txt', './Queue/Queue/Medium/PriorityQueue/PriorityQueue.java', 'M', './Queue/Queue/Medium/PriorityQueue/heading.txt', 2),
('q5', './Queue/Queue/Medium/QueueLinkedListImplementation/description.txt', './Queue/Queue/Medium/QueueLinkedListImplementation/QueueLinkedListImplementation.txt', './Queue/Queue/Medium/QueueLinkedListImplementation/QueueLinkedListImplementation.java', 'M', './Queue/Queue/Medium/QueueLinkedListImplementation/heading.txt', 2),
('q6', './Queue/Queue/Medium/QueueUsingStacks/description.txt', './Queue/Queue/Medium/QueueUsingStacks/QueueUsingStacks.txt', './Queue/Queue/Medium/QueueUsingStacks/QueueUsingStacks.java', 'M', './Queue/Queue/Medium/QueueUsingStacks/heading.txt', 2),
('q7', './Queue/Queue/Hard/kQueue/description.txt', './Queue/Queue/Hard/kQueue/kQueue.txt', './Queue/Queue/Hard/kQueue/kQueue.java', 'H', './Queue/Queue/Hard/kQueue/heading.txt', 2),
('q8', './Queue/Queue/Hard/LargestMultipleOf3/description.txt', './Queue/Queue/Hard/LargestMultipleOf3/LargestMultipleOf3.txt', './Queue/Queue/Hard/LargestMultipleOf3/LargestMultipleOf3.java', 'H', './Queue/Queue/Hard/LargestMultipleOf3/heading.txt', 2),
('s1', './Stack/Stack/Easy/ParenthesesCheck/description.txt', './Stack/Stack/Easy/ParenthesesCheck/ParenthesesCheck.txt', './Stack/Stack/Easy/ParenthesesCheck/ParenthesesCheck.java', 'E', './Stack/Stack/Easy/ParenthesesCheck/heading.txt', 3),
('s10', './Stack/Stack/Hard/kStacks/description.txt', './Stack/Stack/Hard/kStacks/kStacks.txt', './Stack/Stack/Hard/kStacks/kStacks.java', 'H', './Stack/Stack/Hard/kStacks/heading.txt', 3),
('s11', './Stack/Stack/Hard/NextGreaterElement/description.txt', './Stack/Stack/Hard/NextGreaterElement/NextGreaterElement.txt', './Stack/Stack/Hard/NextGreaterElement/NextGreaterElement.java', 'H', './Stack/Stack/Hard/NextGreaterElement/heading.txt', 3),
('s12', './Stack/Stack/Hard/RecursionReverseStack/description.txt', './Stack/Stack/Hard/RecursionReverseStack/RecursionReverseStack.txt', './Stack/Stack/Hard/RecursionReverseStack/RecursionReverseStack.java', 'H', './Stack/Stack/Hard/RecursionReverseStack/heading.txt', 3),
('s13', './Stack/Stack/Hard/SortStack/description.txt', './Stack/Stack/Hard/SortStack/SortStack.txt', './Stack/Stack/Hard/SortStack/SortStack.java', 'H', './Stack/Stack/Hard/SortStack/heading.txt', 3),
('s14', './Stack/Stack/Hard/StockSpanProblem/description.txt', './Stack/Stack/Hard/StockSpanProblem/StockSpanProblem.txt', './Stack/Stack/Hard/StockSpanProblem/StockSpanProblem.java', 'H', './Stack/Stack/Hard/StockSpanProblem/heading.txt', 3),
('s2', './Stack/Stack/Easy/StackIntroduction/description.txt', './Stack/Stack/Easy/StackIntroduction/StackIntroduction.txt', './Stack/Stack/Easy/StackIntroduction/StackIntroduction.java', 'E', './Stack/Stack/Easy/StackIntroduction/heading.txt', 3),
('s3', './Stack/Stack/Easy/StringReverse/description.txt', './Stack/Stack/Easy/StringReverse/StringReverse.txt', './Stack/Stack/Easy/StringReverse/StringReverse.java', 'E', './Stack/Stack/Easy/StringReverse/heading.txt', 3),
('s4', './Stack/Stack/Medium/InfixToPostfix/description.txt', './Stack/Stack/Medium/InfixToPostfix/InfixToPostfix.java', './Stack/Stack/Medium/InfixToPostfix/InfixToPostfix.java', 'M', './Stack/Stack/Medium/InfixToPostfix/heading.txt', 3),
('s5', './Stack/Stack/Medium/MergeableStack/description.txt', './Stack/Stack/Medium/MergeableStack/MergeableStack.txt', './Stack/Stack/Medium/MergeableStack/MergeableStack.java', 'M', './Stack/Stack/Medium/MergeableStack/heading.txt', 3),
('s6', './Stack/Stack/Medium/PostfixEvaluation/description.txt', './Stack/Stack/Medium/PostfixEvaluation/PostfixEvaluation.txt', './Stack/Stack/Medium/PostfixEvaluation/PostfixEvaluation.java', 'M', './Stack/Stack/Medium/PostfixEvaluation/heading.txt', 3),
('s7', './Stack/Stack/Medium/SpecialStack/description.txt', './Stack/Stack/Medium/SpecialStack/SpecialStack.txt', './Stack/Stack/Medium/SpecialStack/SpecialStack.java', 'M', './Stack/Stack/Medium/SpecialStack/heading.txt', 3),
('s8', './Stack/Stack/Medium/StackUsingQueues/description.txt', './Stack/Stack/StackUsingQueues/StackUsingQueues.txt', './Stack/Stack/StackUsingQueues/StackUsingQueues.java', 'M', './Stack/Stack/Medium/StackUsingQueues/heading.txt', 3),
('s9', './Stack/Stack/Medium/TwoStacks/description.txt', './Stack/Stack/TwoStacks/TwoStacks.txt', './Stack/Stack/TwoStacks/TwoStacks.java', 'M', './Stack/Stack/Medium/TwoStacks/heading.txt', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `create_date`) VALUES
(1, 'Neerav', 'ostwalneerav@gmail.com', '119e4c31203dfac5a71e7bdc3cb5a95c', '2016-07-13 18:59:34'),
(2, 'Nicky', 'jain.neerav94@gmail.com', 'd64064356f1aea3edf29d7d1ace176c0', '2016-07-14 22:40:46'),
(3, 'Jateen Mittal', 'jateenmittal0994@gmail.com', '4b34247a5d3f8fa3e19d9022e2eaf795', '2016-07-16 09:00:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
