

<div class="wrapper col-md-3">
    	<ul class="list-group">
            <li class="list-group-item">
            	<a href="/home" style="text-decoration: none;">
            		<span style="font-weight: bold;">
                        Dashboard
                    </span>
            	</a>
            </li>
            @if(auth()->user()->user_role == 3)
            <li class="list-group-item">
            	<a href="/activities" style="text-decoration: none;">
            		<span style="color: orange; font-weight: bold;">
                        Task Summary
                    </span>
            	</a>
            </li>
            <li class="list-group-item">
            	<a href="/activities/create" style="text-decoration: none;">
            		<span style="color: green; font-weight: bold;">
                        Log New Task
                    </span>
            	</a>
            </li>
            <li class="list-group-item">
                <a href="#" style="text-decoration: none;">
                    <span style="color: red; font-weight: bold;">
                        Overdue
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="/inprogress" style="text-decoration: none;">
                    <span style="color: skyblue; font-weight: bold;">
                        In-progress
                    </span>
                </a>
            </li>
            <li class="list-group-item">
                <a href="/completed" style="text-decoration: none;">
                    <span style="color: black; font-weight: bold;">
                        Completed
                    </span>
                </a>
            </li>

            @elseif(auth()->user()->user_role == 2)
            <li class="list-group-item">
                <a href="/setup" style="text-decoration: none;">
                    <span style="color: orange; font-weight: bold;">
                        Table Maintenance
                    </span>
                </a>
            </li>

            @elseif(auth()->user()->user_role == 1)
            <li class="list-group-item">
                <a href="/setup" style="text-decoration: none;">
                    <span style="color: orange; font-weight: bold;">
                        Table Maintenance
                    </span>
                </a>
            </li>         
            <li class="list-group-item">
                <a href="/users" style="text-decoration: none;">
                    <span style="color: black; font-weight: bold;">
                        User Settings
                    </span>
                </a>
            </li>            
            @endif                                    
        </ul>
</div>