			var $img = $('#heart'),
				scale = 1.1,
				h = $img.height(),
				sh = h*scale;

			function scaleUp($elt)
			{
				$elt.animate({height: sh}, function ()
				{
					scaleDown($elt);
				});
			}

			function scaleDown($elt)
			{
				$elt.animate({height: h}, function ()
				{
					scaleUp($elt);
				});
			}

			scaleUp($img);
