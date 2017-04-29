<div class="container" >
	<div class="row">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-6 text-right">
					<ul class="nav_sites">
						<li>Navigation</li>
						<li><a href="{{ url('/') }}" id="nav_travel" class="nav_site" title="Tony & Stacie Travel">Home</a>&emsp;&emsp;</li>
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
		<div class="addthis_inline_follow_toolbox">
			<div id="atftbx" class="at-follow-tbx-element addthis-smartlayers addthis-animated at4-show">
				<p><span>Follow</span></p>
				<div class="addthis_toolbox addthis_default_style">
					<a class="at300b at-follow-btn" data-svc="facebook" data-svc-id="TheStaciesPlace" title="Follow on Facebook" href="http://www.facebook.com/TheStaciesPlace" target="_blank"><img src="/images/icon/social/facebook.png" /></a>
					<a class="at300b at-follow-btn" data-svc="instagram" data-svc-id="StaciesPlace" title="Follow on Instagram" href="http://instagram.com/StaciesPlace" target="_blank"><img src="/images/icon/social/instagram.png" /></a>
					<a class="at300b at-follow-btn" data-svc="twitter" data-svc-id="Stacies_Place" title="Follow on Twitter" href="http://twitter.com/intent/follow?source=followbutton&amp;variant=1.0&amp;screen_name=Stacies_Place" target="_blank"><img src="/images/icon/social/twitter.png" /></a>
					<a class="at300b at-follow-btn" data-svc="pinterest" data-svc-id="Stacies_Place" title="Follow on Pinterest" href="http://www.pinterest.com/Stacies_Place" target="_blank"><img src="/images/icon/social/pinterest.png" /></a>
					<a class="at300b at-follow-btn" data-svc="snapchat" data-svc-id="staciesplace" title="Follow on Snapchat" href="https://www.snapchat.com/add/staciesplace" target="_blank"><img src="/images/icon/social/snapchat.png" /></a>
					<div class="atclear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row footer_row">
		<div id="atftbx" class="at-follow-tbx-element">
			<p><span>Contact</span></p>
			<div class="addthis_toolbox">
				<a target="_blank" href="https://mail.google.com/mail/u/0/?view=cm&amp;to=webmaster@HoxsieHouse.com" id="email_gmail" class="at300b" title="Contact via Gmail"><img src="/images/icon/mail/gmail.png" /></a>
				<a target="_blank" href="https://mail.live.com/default.aspx?rru=compose&amp;to=webmaster@HoxsieHouse.com" id="email_hotmail" class="at300b" title="Contact via Hotmail"><img src="/images/icon/mail/hotmail.png" /></a>
				<a target="_blank" href="http://mail.aol.com/mail/compose-message.aspx?to=webmaster@Hoxsiehouse.com" id="email_aol" class="at300b" title="Contact via AOL"><img src="/images/icon/mail/aol.png" /></a>
				<a target="_blank" href="http://compose.mail.yahoo.com/?to=webmaster@Hoxsiehouse.com" id="mail_yahoo" class="at300b" title="Contact via Yahoo"><img src="/images/icon/mail/yahoo.png" /></a>
				<a target="_blank" href="http://mail01.mail.com/scripts/mail/Outblaze.mail?composeto=webmaster@HoxsieHouse.com&amp;compose=1" id="mail_mail" class="at300b" title="Contact via Mail.com"><img src="/images/icon/mail/mail.png" /></a>
				<a target="_blank" href="http://mymail.operamail.com/scripts/mail/Outblaze.mail?compose=1&amp;did=1&amp;a=1&amp;to=webmaster@HoxsieHouse.com" id="mail_opera" class="at300b" title="Contact via Opera"><img src="/images/icon/mail/opera.png" /></a>
				<a target="_blank" href="https://www.icloud.com/#mail/secure/start?action=message/en-us/#compose&amp;to=mailto:webmaster@HoxsieHouse.com" id="mail_icloud" class="at300b" title="Contact via Icloud"><img src="/images/icon/mail/icloud.png" /></a>
				<a target="_blank" href="https://zmail.zoho.com/mail/compose.do?extsrc=mailto&amp;mode=compose&amp;tp=zb&amp;ct=webmaster@HoxsieHouse.com" id="mail_zmail" class="at300b" title="Contact via Zoho"><img src="/images/icon/mail/zoho.png" /></a>
				<a target="_blank" href="mailto:webmaster@Hoxsiehouse.com" id="mail_general" class="at300b" title="Contact via mail"><img src="/images/icon/mail/general.png" /></a>
				<div class="atclear"></div>
			</div>
		</div>
	</div>
</div><br/><br/>
@section('scripts')
	<script type="text/javascript" src="/js/google.analytics.min.js"></script>
	<script type="text/javascript" src="/js/jquery-2.2.4.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59036f12cf048f43"></script>
	<script>
		$('.mail_icon').tooltip();
		$('.social_icon').tooltip();
	</script>
	<style type="text/css">.addthis_default_style .at300b{float: none;}</style>
@show