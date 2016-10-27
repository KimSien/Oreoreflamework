<?php

			//あとでまとめてくれ
			function autoload_classes( $class_name='undefine') {
				$files = AutoLoadClass.$class_name.'.php';
				if(file_exists($files))
				include($files);
			}

			function autoload_classes2( $class_name='undefine') {
				$files = AutoLoadClass2.$class_name.'.php';
				if(file_exists($files))
				include($files); 
			}		
			spl_autoload_register( 'autoload_classes');
			spl_autoload_register( 'autoload_classes2');

