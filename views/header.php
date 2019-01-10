<div>
	<br>
		<?php if (User::isGuest()): ?>
			<a href="/register">register</a> <br>
			<a href="/enter">enter</a> <br>
		<?php else: ?>
			<a href="/createnote">Create note</a> <br>
			<a href="/exit">exit</a> <br>
		<?php endif; ?> 
			<a href="/seeauthors">See all authors</a> <br>
			<a href="/equalnotes">Notes with equals title</a> 
	<br>
</div>