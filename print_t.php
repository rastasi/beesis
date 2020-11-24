<?				$tisztitando = str_replace("<", "[", $tisztitando);
				$tisztitando = str_replace(">", "]", $tisztitando);
				
				$tisztitando = str_replace("[b]", "<b>", $tisztitando);
				$tisztitando = str_replace("[/b]", "</b>", $tisztitando);
				
				$tisztitando = str_replace("[B]", "<b>", $tisztitando);
				$tisztitando = str_replace("[/B]", "</b>", $tisztitando);
				
				$tisztitando = str_replace("[i]", "<i>", $tisztitando);
				$tisztitando = str_replace("[/i]", "</i>", $tisztitando);
				
				$tisztitando = str_replace("[I]", "<i>", $tisztitando);
				$tisztitando = str_replace("[/I]", "</i>", $tisztitando);
				
				$tisztitando = str_replace("[u]", "<u>", $tisztitando);
				$tisztitando = str_replace("[/u]", "</u>", $tisztitando);
				
				$tisztitando = str_replace("[U]", "<u>", $tisztitando);
				$tisztitando = str_replace("[/U]", "</u>", $tisztitando);
				
				$tisztitando = str_replace('[URL href="', '<a href="', $tisztitando);
				$tisztitando = str_replace('" target="_blank"]', '" target="_blank">', $tisztitando);
				$tisztitando = str_replace('"]', '" target="_blank">', $tisztitando);
				$tisztitando = str_replace("[/URL]", "</a>", $tisztitando);
				
				$tisztitando = str_replace('[EMAIL mailto:"', '<a href="mailto:', $tisztitando);
				$tisztitando = str_replace('" ]', '">', $tisztitando);
				$tisztitando = str_replace("[/EMAIL]", "</a>", $tisztitando);

				$tisztitando = str_replace('[a href="', '<a href="', $tisztitando);
				$tisztitando = str_replace('" target="_blank"]', '" target="_blank">', $tisztitando);
				$tisztitando = str_replace('"]', '" target="_blank">', $tisztitando);
				$tisztitando = str_replace("[/a]", "</a>", $tisztitando);
				
				$tisztitando = str_replace('[a mailto:"', '<a href="mailto:', $tisztitando);
				$tisztitando = str_replace('" ]', '">', $tisztitando);
				$tisztitando = str_replace("[/a]", "</a>", $tisztitando);
?>