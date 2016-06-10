<div class="container" >
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-6 text-right">
					<ul class="nav_sites">
						<li>Navigation</li>
						<li><a href="{{ url('/post') }}" id="nav_travel" class="nav_site" title="Tony & Stacie Travel">Home</a>&emsp;&emsp;</li>
						<li><a href="{{ url('/post?type=travel') }}" id="nav_travel" class="nav_site" title="Redcherries">Travel</a>&emsp;&emsp;</li>
					</ul>				
				</div>
				<div class="col-xs-6">
					<ul class="sister_sites">
						<li>Sister Sites</li>
						<li><a target="_blank" href="http://crafts.hoxsiehouse.com/" id="site_craft" class="sister_site" title="Nite Owl Creates">Nite Owl Creates</a></li>
						<li><a target="_blank" href="http://stacieplace.hoxsiehouse.com/" id="site_stacie" class="sister_site" title="Stacie's Place">Stacie's Place</li>
						<li><a target="_blank" href="http://travel.hoxsiehouse.com/" id="site_travel" class="sister_site" title="Tony & Stacie Travel">Travel</a></li>
						<li><a target="_blank" href="http://stacie.hoxsiehouse.com/" id="site_redcherries" class="sister_site" title="Redcherries">Red Cherries</a></li>
						<li><a target="_blank" href="http://wedding.hoxsiehouse.com/" id="site_wedding" class="sister_site" title="Our Wedding">Wedding</a></li>
						@if (!Auth::guest()) @if (Auth::user()->type == App\Models\User::TYPE_ADMIN)<li><a target="_blank" href="http://private.hoxsiehouse.com/" id="site_private" class="sister_site" title="Personal Blog">Private</a></li> @endif @endif
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row footer_row">
		<ul class="social_links">
			<li><a target="_blank" href="https://www.facebook.com/TheStaciesPlace" id="social_facebook" class="social_icon" title="Facebook"><img src="/images/icon/social/facebook.png" /></a></li>
			<li><a target="_blank" href="https://www.instagram.com/StaciesPlace/" id="social_instagram" class="social_icon" title="Instagram"><img src="/images/icon/social/instagram.png" /></a></li>
			<li><a target="_blank" href="https://twitter.com/Stacies_Place" id="social_twitter" class="social_icon" title="Twitter"><img src="/images/icon/social/twitter.png" /></a></li>
			<li><a target="_blank" href="https://www.pinterest.com/stacies_place/" id="social_pintrest" class="social_icon" title="Pintrest"><img src="/images/icon/social/pinterest.png" /></a></li>
			<li><a target="_blank" href="https://www.bloglovin.com/people/staciesh-1842418" id="social_bloglovin" class="social_icon" title="BlogLovin"><img src="/images/icon/social/bloglovin.png" /></a></li>
			<li><a target="_blank" href="snapchat://add/staciesplace" id="social_snapchat" class="social_icon" title="SnapChat"><img src="/images/icon/social/snapchat.png" /></a></li>
		</ul>
	</div>
	<div class="row footer_row">
		<ul class="contact_us_links">
			<li><a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&amp;to=webmaster@HoxsieHouse.com" id="email_gmail" class="mail_icon" title="Gmail"><img src="/images/icon/mail/gmail.png" /></a></li>
			<li><a target="_blank" href="https://mail.live.com/default.aspx?rru=compose&amp;to=webmaster@HoxsieHouse.com" id="email_hotmail" class="mail_icon" title="Hotmail"><img src="/images/icon/mail/hotmail.png" /></a></li>
			<li><a target="_blank" href="http://mail.aol.com/mail/compose-message.aspx?to=webmaster@Hoxsiehouse.com" id="email_aol" class="mail_icon" title="AOL"><img src="/images/icon/mail/aol.png" /></a></li>
			<li><a target="_blank" href="http://compose.mail.yahoo.com/?to=webmaster@Hoxsiehouse.com" id="mail_yahoo" class="mail_icon" title="Yahoo"><img src="/images/icon/mail/yahoo.png" /></a></li>
			<li><a target="_blank" href="http://mail01.mail.com/scripts/mail/Outblaze.mail?composeto=webmaster@HoxsieHouse.com&amp;compose=1" id="mail_mail" class="mail_icon" title="Mail.com"><img src="/images/icon/mail/mail.png" /></a></li>
			<li><a target="_blank" href="http://mymail.operamail.com/scripts/mail/Outblaze.mail?compose=1&amp;did=1&amp;a=1&amp;to=webmaster@HoxsieHouse.com" id="mail_opera" class="mail_icon" title="Opera"><img src="/images/icon/mail/opera.png" /></a></li>
			<li><a target="_blank" href="https://www.icloud.com/#mail/secure/start?action=message/en-us/#compose&amp;to=mailto:webmaster@HoxsieHouse.com" id="mail_icloud" class="mail_icon" title="Icloud"><img src="/images/icon/mail/icloud.png" /></a></li>
			<li><a target="_blank" href="https://zmail.zoho.com/mail/compose.do?extsrc=mailto&amp;mode=compose&amp;tp=zb&amp;ct=webmaster@HoxsieHouse.com" id="mail_zmail" class="mail_icon" title="Zoho"><img src="/images/icon/mail/zoho.png" /></a></li>
			<li><a href="mailto:webmaster@Hoxsiehouse.com" id="mail_general" class="mail_icon" title="General"><img src="/images/icon/mail/general.png" /></a></li>
		</ul>
	</div>
</div>
@section('scripts')

	<script src="/js/jquery-2.2.4.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<script>
		$('.mail_icon').tooltip();
		$('.social_icon').tooltip();
	</script>
@show