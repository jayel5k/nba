-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.0.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5104
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for nba
CREATE DATABASE IF NOT EXISTS `nba` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `nba`;

-- Dumping structure for table nba.conference
CREATE TABLE IF NOT EXISTS `conference` (
  `East` varchar(50) DEFAULT NULL,
  `West` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nba.conference: ~0 rows (approximately)
/*!40000 ALTER TABLE `conference` DISABLE KEYS */;
/*!40000 ALTER TABLE `conference` ENABLE KEYS */;

-- Dumping structure for table nba.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `team` varchar(50) DEFAULT NULL,
  `conference` varchar(50) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table nba.teams: ~30 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`team`, `conference`, `division`) VALUES
	('Dallas Mavericks', 'Western Conference', 'Southwest Division'),
	('Houston Rockets', 'Western Conference', 'Southwest Division'),
	('Memphis Grizzlies', 'Western Conference', 'Southwest Division'),
	('New Orleans Pelicans', 'Western Conference', 'Southwest Division'),
	('San Antonio Spurs', 'Western Conference', 'Southwest Division'),
	('Denver Nuggets', 'Western Conference', 'Northwest Division'),
	('Minnesota Timberwolves', 'Western Conference', 'Northwest Division'),
	('Oklahoma City Thunder', 'Western Conference', 'Northwest Division'),
	('Portland Trail Blazers', 'Western Conference', 'Northwest Division'),
	('Utah Jazz', 'Western Conference', 'Northwest Division'),
	('Golden State Warriors', 'Western Conference', 'Pacific Division'),
	('Los Angeles Clippers', 'Western Conference', 'Pacific Division'),
	('Los Angeles Lakers', 'Western Conference', 'Pacific Division'),
	('Phoenix Suns', 'Western Conference', 'Pacific Division'),
	('Sacramento Kings', 'Western Conference', 'Pacific Division'),
	('Cleveland Cavaliers', 'Eastern Conference', 'Central Division'),
	('Boston Celtics', 'Eastern Conference', 'Atlantic Division'),
	('Brooklyn Nets', 'Eastern Conference', 'Atlantic Division'),
	('New York Knicks', 'Eastern Conference', 'Atlantic Division'),
	('Philadelphia 76ers', 'Eastern Conference', 'Atlantic Division'),
	('Toronto Raptors', 'Eastern Conference', 'Atlantic Division'),
	('Chicago Bulls', 'Eastern Conference', 'Central Division'),
	('Detroit Pistons', 'Eastern Conference', 'Central Division'),
	('Indiana Pacers', 'Eastern Conference', 'Central Division'),
	('Milwaukee Bucks', 'Eastern Conference', 'Central Division'),
	('Atlanta Hawks', 'Eastern Conference', 'Southeast Division'),
	('Charlotte Hornets', 'Eastern Conference', 'Southeast Division'),
	('Miami Heat', 'Eastern Conference', 'Southeast Division'),
	('Orlando Magic', 'Eastern Conference', 'Southeast Division'),
	('Washington Wizards', 'Eastern Conference', 'Southeast Division');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
