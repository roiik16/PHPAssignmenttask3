<div id="sidebar">
  <nav>
      <ul>
          <li>
              <a href="Home" <?php if ($this->router->fetch_class () == 'Home') echo ' class="active"' ?>> <i id="homeicon" class="fa fa-home fa-3x" style="color:white" aria-hidden="true"></i></a>
          </li>
          <li>
              <a href="newsfeed" <?php if ($this->router->fetch_class () == 'Newsfeed') echo ' class="active"' ?>> <i id="newspapericon" class="fa fa-newspaper-o fa-3x" style="color:white"  aria-hidden="true"></i></a>
          </li>
          <li>
               <a href="notes.php" <?php if ($this->router->fetch_class () == 'Notes') echo ' class="active"' ?>> <i id="newfile" class="fa fa-file-text fa-3x" style="color:white" aria-hidden="true"></i></a>
          </li>
          <li>
              <a  href="newsfeed.php"><i id="calendaricon" class="fa fa-calendar fa-3x" style="color:white" aria-hidden="true"></i></a>
          </li>
          <li>
              <a href="contact.php"><i id="envelopeicon" class="fa fa-envelope fa-3x " style="color:white" aria-hidden="true"></i></a>
          </li>
      </ul>
  </nav>
</div>